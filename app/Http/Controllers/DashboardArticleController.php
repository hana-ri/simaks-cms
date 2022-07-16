<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class DashboardArticleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (auth()->user()->is_admin) {
			return view('dashboard/articles/index', [
				'articles' => Article::paginate(50),
			]);
		}

		return view('dashboard/articles/index', [
			'articles' => Article::where('user_id', auth()->user()->id)->get(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('dashboard/articles/create', [
			'categories' => Category::all(),
			'tags' => Tag::all(),
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'title' => 'required|max:255',
			'slug' => 'required|unique:articles',
			'category_id' => 'required',
			'body' => 'required',
			'is_published' => 'required',
			'thumbnail' => 'nullable|image|file|max:1024',
			'tags' => 'nullable'
		];

		$validatedData = $request->validate($rules);

		if ($request->file('thumbnail')) {
			$newFileName = substr(md5($request->file('thumbnail')), 6, 6).'_'.time();
			$fileExtension = $request->file('thumbnail')->extension();
			$validatedData['thumbnail'] = $request->file('thumbnail')->storeAs('article-thumbnails', "$newFileName.$fileExtension");
		}

		$validatedData['user_id'] = auth()->user()->id;

		$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 160);

		$body = $this->summernoteImageUpload($request->body);

		$validatedData['body'] = $body;

		$article = new Article($validatedData);
		$article->save();
		if ($request->tags) {
			$tag = Tag::whereIn('slug', $validatedData['tags'])->get();
			$article->tags()->attach($tag);
		}

		return redirect('/dashboard/articles')->with('success', 'Article created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function show(Article $article)
	{
		return view('dashboard/articles/show', [
			'article' => $article,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Article $article)
	{
		return view('/dashboard/articles/edit', [
			'article' => $article,
			'categories' => Category::all(),
			'tags' => Tag::all(),
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Article $article)
	{
		$rules = [
			'title' => 'required|max:255',
			'category_id' => 'required',
			'body' => 'required',
			'is_published' => 'required',
			'thumbnail' => 'nullable|image|file|max:1024',
		];

		if ($request->slug !== $article->slug) {
			$rules['slug'] = 'required|unique:articles';
		}

		$validatedData = $request->validate($rules);

		// Thumbnail update
		if ($request->file('thumbnail')) {
			if($request->oldThumbnail) {
				Storage::delete($request->oldThumbnail);
			}
			$newFileName = substr(md5($request->file('thumbnail')), 6, 6).'_'.time();
			$fileExtension = $request->file('thumbnail')->extension();
			$validatedData['thumbnail'] = $request->file('thumbnail')->storeAs('article-thumbnails', "$newFileName.$fileExtension");
		}

		$validatedData['excerpt'] = Str::limit(strip_tags($request->body), 250);

		
		$body = $this->summernoteImageUpload($request->body);
		
		$validatedData['body'] = $body;
		
		$article->update($validatedData);
	
		if ($request->tags) {
			$article->tags()->detach();
			$tag = Tag::whereIn('slug', $request->tags)->get();	
			$article->tags()->attach($tag);
		}

		return redirect('/dashboard/articles')->with('success', 'Article updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Article $article)
	{        

		$this->summernoteImageDelete($article->body);
		// Thumbnail delete
		if($article->thumbnail) {
				Storage::delete($article->thumbnail);
		}

		$article->tags()->detach();
		$article->delete();

		return back()->with('success', 'Article deleted successfully');
	}

	public function checkSlug(Request $request)
	{
		$slug = SlugService::createSlug(Article::class, 'slug', $request->title);
		return response()->json(['slug' => $slug]);
	}

	public function summernoteImageUpload($body)
	{
		// Summernote images upload
		$storage = 'storage/article-images';
		if (!file_exists($storage)) {
			mkdir($storage, 775, true);
		}
		$content = $body;
		$dom = new \DomDocument();
		libxml_use_internal_errors(true);
		$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		libxml_clear_errors();
		$images = $dom->getElementsByTagName('img');


		foreach ($images as $img) {
			$src = $img->getAttribute('src');
			if (preg_match('/data:image/', $src)) {
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimeType = $groups['mime'];
				$fileNameContent = uniqid();
				$fileNameContentRand = substr(md5($fileNameContent), 6,6).'_'.time();
				$filePath = ("$storage/$fileNameContentRand.$mimeType");
				$image = Image::make($src)
							// ->resize(900, 400)
							->encode($mimeType, 60)
							->save(public_path($filePath));
				$new_src = asset($filePath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
				$img->setAttribute('class', 'img-responsive');
			}
		}

		return $dom->saveHTML();
	}

	public function summernoteImageDelete($body)
	{
		// Summernote images delete
		$content = $body;
		$dom = new \DomDocument();
		libxml_use_internal_errors(true);
		$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		libxml_clear_errors();
		$images = $dom->getElementsByTagName('img');

		foreach ($images as $img) {
			$src = $img->getAttribute('src');
			if (preg_match('/article-images/', $src)) {
				preg_match('/article-images\/(.*)/', $src, $groups);
				Storage::delete($groups[0]);
			}
		}
	}
}

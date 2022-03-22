<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Article;
use App\Models\Category;

class DashboardArticle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'categories' => Category::all()
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
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'category_id' => 'required',
            'is_published' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|file|max:1024'
        ]);

        if ($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('article-thumbnails');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 160);

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Article created');
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
            'thumbnail' => 'image|file|max:1024'
        ];

        if ($request->slug !== $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('thumbnail')) {
            if($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('article-thumbnails');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 250);


        Article::updateOrCreate(
            ['id' => $article->id, 'user_id' => auth()->user()->id],
            $validatedData
        );

        // Article::where(['id' => $article->id, 'user_id' => auth()->user()->id])->update($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->thumbnail) {
                Storage::delete($article->thumbnail);
        }

        Article::destroy($article->id);

        return redirect('/dashboard/articles')->with('success', 'Article has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}

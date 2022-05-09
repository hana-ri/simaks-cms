<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
// use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleController extends Controller
{

	/**
	* funsi menangani kontrol dari artikel-artikel
	* @return mengembalikan halaman berserta data yang dibutuhkan
	*/
	public function index()
    {

        SEOMeta::setTitle('SIMAKS Blog - Tutorial Website, Bisnis Online, dan Blog');
        SEOMeta::setDescription('Temukan artikel terbaru seputar teknologi, SEO, software development, dan digital marketing di blog SIMAKS');
        SEOMeta::setCanonical(url()->current());
        OpenGraph::setUrl(url()->current());

		if (request('category')) {
			$category = Category::firstWhere('slug', request('category'));
		}

		if (request('author')) {
			$author = User::firstWhere('username', request('author'));
		}

		return view('articles',  [
	        "articles" => Article::latest()
	        				->where('is_published', true)
	        				->filter(request(['search', 'category']))
	        				->paginate(5)
	        				->withQueryString()
   		]);
	}

	/**
	* menangani single artikel
	* @return hamalan dan data single artikel
	*/
	public function article(Article $article)
	{

        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->excerpt);
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:modified_time', $article->updated_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Blog', 'property');
        SEOMeta::addMeta('article:publisher', 'localhost', 'property');
        OpenGraph::setTitle($article->title);
        OpenGraph::setDescription($article->excerpt);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('url', url()->current());
        OpenGraph::addImage(url('').'/'.$article->thumbnail, ['height' => 900, 'width' => 400, 'type' => 'image/jpeg']);
        JsonLd::setTitle($article->title);
        JsonLd::setDescription($article->excerpt);
        JsonLd::setType('Article');
        JsonLd::addImage(url('').'/'.$article->thumbnail);

		if ($article->is_published) {
			return view('article', [
	        	"article" => $article
    		]);
		} else {
			return redirect('/blog/articles');
		}		
	}

    /**
     * menangani pencarian artikel berdasarkan author
     * @return halaman articles beserta data yang didapat
     * */
	public function author(User $author) {
		return view('articles', [
			"page" => 'author',
			"articles" => $author->articles()
							->where('is_published', true)
							->latest()
							->paginate(5),
		]);
	}


    /**
     * menangani pencarian artikel berdasarkan category
     * @return halaman articles beserta data yang didapat
     * */
	public function category(Category $category) {
		return view('articles', [
			"page" => 'author',
			"articles" => $category->articles()->latest()->paginate(5),
		]);
	}
	
}

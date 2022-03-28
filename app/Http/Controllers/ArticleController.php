<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

use Artesaos\SEOTools\Facades\SEOTools;

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

		$page = "Blog";


        SEOTools::setTitle('SIMAKS Blog - Tutorial informasi teknologi');
        SEOTools::setDescription('Temukan informasi, dan artikel terbaru seputar teknologi, SEO, software development, dan digital marketing di blog SIMAKS.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        // SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

		if (request('category')) {
			$category = Category::firstWhere('slug', request('category'));
			$page = 'Category ' . $category->name;
		}

		if (request('author')) {
			$author = User::firstWhere('username', request('author'));
			$page = 'By ' . $author->name;
		}

		return view('articles',  [
	    	"page" => $page,
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
        SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:updated_time', $article->updated_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Blog', 'property');
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']);

        OpenGraph::setDescription($article->excerpt);
        OpenGraph::setTitle($article->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');

		if ($article->is_published) {
			return view('article', [
				"page" => 'Simaks Article',
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

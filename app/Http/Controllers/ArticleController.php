<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class ArticleController extends Controller
{

	/**
	* funsi menangani kontrol dari artikel-artikel
	* @return mengembalikan halaman berserta data yang dibutuhkan
	*/
	public function index()
    {
		SEOTools::setTitle('SIMAKS Blog');
        SEOTools::setDescription('Artikel terbaru seputar teknologi, SEO, software development, dan digital marketing di blog SIMAKS');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        // SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');


		if (request('category')) {
			$category = Category::firstWhere('slug', request('category'));
		}

		if (request('author')) {
			$author = User::firstWhere('username', request('author'));
		}

		return view('articles',  [
			"categories" => Category::all(),
	        "articles" => Article::latest()
	        				->where('is_published', true)
	        				->filter(request(['search', 'category']))
	        				->paginate(9)
	        				->withQueryString()
   		]);
	}

	/**
	* menangani single artikel
	* @return hamalan dan data single artikel
	*/
	public function article(Article $article)
	{
		$keyword = array();
		foreach ($article->tags as $tag) {
			$keyword[] = $tag->name;
		}

		SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->excerpt);
        SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $article->category->name, 'property');
        SEOMeta::addKeyword($keyword);

        OpenGraph::setDescription($article->excerpt);
        OpenGraph::setTitle($article->title);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);

        OpenGraph::addImage($article->thumbnail);
        // OpenGraph::addImage($article->images->list('url'));
        OpenGraph::addImage(['url' => url('').'/'.$article->thumbnail, 'size' => 300]);
        OpenGraph::addImage(url('').'/'.$article->thumbnail, ['height' => 750, 'width' => 300]);
        
        JsonLd::setTitle($article->title);
        JsonLd::setDescription($article->excerpt);
        JsonLd::setType('Article');
        // JsonLd::addImage($article->images->list('url'));

		OpenGraph::setTitle($article->title)
		->setDescription($article->excerpt)
		->setType('article')
		->setArticle([
			'published_time' => $article->created_at->toW3CString(),
			'modified_time' => $article->updated_at->toW3CString(),
			// 'expiration_time' => 'datetime',
			'author' => $article->author->name,
			'section' => $article->category->name,
			'tag' => 'string / array'
		]);

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
							->paginate(9),
		]);
	}


    /**
     * menangani pencarian artikel berdasarkan category
     * @return halaman articles beserta data yang didapat
     * */
	public function category(Category $category) {
		return view('articles', [
			"categories" => Category::all(),
			"articles" => $category->articles()->where('is_published', true)->latest()->paginate(9),
		]);
	}
	
}

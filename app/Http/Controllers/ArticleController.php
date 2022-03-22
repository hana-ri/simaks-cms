<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleController extends Controller
{

	/**
	* funsi menangani kontrol dari artikel-artikel
	* @return mengembalikan halaman berserta data yang dibutuhkan
	*/
	public function articles()
    {

		$page = "Articles";

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

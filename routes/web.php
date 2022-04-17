<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardArticle;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',  [
    	"page" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "page" => "About",
        "author" => "Rizal" 
    ]);
});

/**
* menangani route blog.
*
* @param  App\Http\Controllers\ArticleController;
*/
Route::get('/blog', [ArticleController::class, 'index']);
Route::get('/blog/author/{author:username}', [ArticleController::class, 'author']);
Route::get('/blog/category/{category:slug}', [ArticleController::class, 'category']);
Route::get('/blog/{article:slug}', [ArticleController::class, 'article']);
Route::get('/blog/topics/list', function() {
		return view('categories', [
			"page" => "Categories",
			"categories" => Category::all()
		]);
	});

/**
* menangani route login/autentifikasi.
*
* @param  App\Http\Controllers\LoginController;
*/
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/**
* menangani route register.
*
* @param  App\Http\Controllers\RegisterController;
*/
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

/**
* menangani route dashboard.
*
* @param  App\Http\Controllers\RegisterController;
*/
Route::get('/dashboard', function() { 
	return view('dashboard/index');
    })->middleware('auth');

Route::get('/dashboard/articles/checkSlug', [DashboardArticle::class, 'checkSlug']);

Route::resource('/dashboard/articles', DashboardArticle::class)
        ->middleware('auth');

Route::resource('/dashboard/categories', CategoryController::class)
        ->except(['show', 'create'])
        ->middleware('auth');

Route::resource('/dashboard/users', UserController::class)
        ->except(['show', 'create', 'store'])
        ->middleware('admin');
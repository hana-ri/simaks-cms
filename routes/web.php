<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardTagController;


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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
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
*/
Route::get('/dashboard', function() { 
	    return view('dashboard/index');
    })->middleware('auth');

Route::get('/dashboard/articles/checkSlug', [DashboardArticleController::class, 'checkSlug']);

Route::resource('/dashboard/articles', DashboardArticleController::class)
        ->middleware('auth');

Route::resource('/dashboard/categories', DashboardCategoryController::class)
        ->except(['show', 'create'])
        ->middleware('auth');

Route::resource('/settings/users', DashboardUserController::class)
        ->except(['show', 'create'])
        ->middleware('admin');

Route::resource('/dashboard/tag', DashboardTagController::class)->middleware('admin'); 
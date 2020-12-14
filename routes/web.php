<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');

Route::middleware('auth')->group(function(){
    Route::resource('articles', ArticleController::class);
    Route::get('articles.view/{id}', [ArticleController::class, 'showArticle'])->name('articles.view');
    Route::get('main', [MainController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

});



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

Route::get('/', [homePageController::class, 'index']);
Route::get('/posts/{slug}', [homePageController::class, 'singlePage'])->name('post');
Route::get('/categories/{category}', [homePageController::class, 'getArticles'])->name('category');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact',[ContactController::class,'sendMail'])->name('mail');
Route::get('/{page}', [homePageController::class,'getPages'])->name('page');

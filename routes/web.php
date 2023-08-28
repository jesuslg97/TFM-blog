<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'Controller@welcome')->name('welcome');

Route::get('/last_post', 'Controller@last_post')->name('last_post');

Route::get('/aboutUs', 'Controller@aboutUs')->name('aboutUs');
Route::get('/contact', 'Controller@contact')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('categories')->group(function () {
    Route::match(['get', 'post'], '/', 'CategorieController@index')->name('categories.index');
    Route::get('/create', 'CategorieController@create')->name('categories.create');
    Route::post('/store', 'CategorieController@store')->name('categories.store');
    Route::get('/{category}/edit', 'CategorieController@edit')->name('categories.edit');
    Route::post('/{category}/update', 'CategorieController@update')->name('categories.update');
    Route::delete('/{category}/delete', 'CategorieController@delete')->name('categories.delete');
    Route::get('/{category}/show', 'CategorieController@show')->name('categories.show');
});

Route::prefix('posts')->group(function () {
    Route::match(['get', 'post'], '/', 'PostController@index')->name('posts.index');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/store', 'PostController@store')->name('posts.store');
    Route::get('/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::post('/{post}/update', 'PostController@update')->name('posts.update');
    Route::delete('/{post}/delete', 'PostController@delete')->name('posts.delete');
    Route::get('/{post}/show', 'PostController@show')->name('posts.show');
});

Route::prefix('comments')->middleware('auth')->group(function () {
    Route::match(['get', 'post'], '/', 'CommentController@index')->name('comments.index');
    Route::get('/create', 'CommentController@create')->name('comments.create');
    Route::post('/store', 'CommentController@store')->name('comments.store');
    Route::get('/{comment}/edit', 'CommentController@edit')->name('comments.edit');
    Route::post('/{comment}/update', 'CommentController@update')->name('comments.update');
    Route::delete('/{comment}/delete', 'CommentController@delete')->name('comments.delete');
});

Route::prefix('languages')->group(function () {
    Route::match(['get', 'post'], '/', 'LanguageController@index')->name('languages.index');
    Route::get('/create', 'LanguageController@create')->name('languages.create');
    Route::post('/store', 'LanguageController@store')->name('languages.store');
    Route::get('/{language}/edit', 'LanguageController@edit')->name('languages.edit');
    Route::post('/{language}/update', 'LanguageController@update')->name('languages.update');
    Route::delete('/{language}/delete', 'LanguageController@delete')->name('languages.delete');
});

Route::prefix('categoriesLang')->group(function () {
    Route::match(['get', 'post'], '/', 'CategoryLangController@index')->name('categoriesLang.index');
    Route::get('/create', 'CategoryLangController@create')->name('categoriesLang.create');
    Route::post('/store', 'CategoryLangController@store')->name('categoriesLang.store');
    Route::get('/{categoryLang}/edit', 'CategoryLangController@edit')->name('categoriesLang.edit');
    Route::post('/{categoryLang}/update', 'CategoryLangController@update')->name('categoriesLang.update');
    Route::delete('/{categoryLang}/delete', 'CategoryLangController@delete')->name('categoriesLang.delete');
    Route::get('/{categoryLang}/show', 'CategoryLangController@show')->name('categoriesLang.show');
});

Route::prefix('postsLang')->group(function () {
    Route::match(['get', 'post'], '/', 'PostLangController@index')->name('postsLang.index');
    Route::get('/create', 'PostLangController@create')->middleware('auth')->name('postsLang.create');
    Route::post('/store', 'PostLangController@store')->middleware('auth')->name('postsLang.store');
    Route::get('/{postLang}/edit', 'PostLangController@edit')->name('postsLang.edit');
    Route::post('/{postLang}/update', 'PostLangController@update')->name('postsLang.update');
    Route::delete('/{postLang}/delete', 'PostLangController@delete')->name('postsLang.delete');
    Route::get('/{postLang}/show', 'PostLangController@show')->name('postsLang.show');
});

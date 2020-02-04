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

use App\Http\Controllers\CommentsController;

Route::get('/', function () {
    $articles = App\Article::orderBy('updated_at', 'desc')->take(5)->get();
    return view('welcome', ['articles' => $articles]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('article');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::post('/articles', 'ArticlesController@store');
Route::put('/articles/{article}', 'ArticlesController@update');
Route::delete('/articles/{article}', 'ArticlesController@destroy');

Route::post('/comments', 'CommentsController@store');
Route::get('/comments/{comment}/edit', 'CommentsController@edit');
Route::put('/comments/{comment}', 'CommentsController@update');
Route::delete('/comments/{comment}', 'CommentsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

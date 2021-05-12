<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home');
Route::get('blog/{article}', 'ArticleController@show')->name('articles.show');
Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');
Route::get('keywords/{keyword}', 'KeywordController@show')->name('keywords.show');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'],
    function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('articles', 'ArticleController@index')->name('admin.articles.index');
        Route::get('articles/create', 'ArticleController@create')->name('admin.articles.create');
        Route::post('articles', 'ArticleController@store')->name('admin.articles.store');
        Route::get('articles/{article}/edit', 'ArticleController@edit')->name('admin.articles.edit');
        Route::put('articles/{article}', 'ArticleController@update')->name('admin.articles.update');
        Route::delete('articles/{article}', 'ArticleController@destroy')->name('admin.articles.destroy');

        Route::post('articles/{article}/resources', 'ResourceController@store')->name('admin.articles.resources.store');
        Route::delete('resource/{resource}', 'ResourceController@destroy')->name('admin.resources.destroy');

});


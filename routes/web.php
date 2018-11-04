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

Route::view('/', 'index');

Route::get('/category/{slug}/posts', 'PostController@postsByCategory')->name('posts.by.category');

Route::get('/page/{slug}', 'PostController@pageBySlug')->name('page');

Route::get('/category/{slug}/post/{id}', 'PostController@getPost')->name('post');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

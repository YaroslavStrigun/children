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

Route::get('/test', function () {
    $form = \App\Services\PaymentService::getPaymentWidget();
    echo $form;
});

Route::post('/payment/save-data', 'PaymentController@savePaymentData')->name('save.payment.data');

Route::get('/', 'HomeController@index')->name('index');

Route::get('/category/{slug}/posts', 'PostController@postsByCategory')->name('posts.by.category');

Route::get('/page/{slug}', 'PostController@pageBySlug')->name('page');

Route::get('/category/{slug}/post/{id}', 'PostController@getPost')->name('post');

Route::post('/send', 'MailController@send')->name('send');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

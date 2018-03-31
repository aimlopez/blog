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

Route::get('/', [
    'uses' => 'PostController@getPostsIndex',
    'as' => 'blog.index',
]);
Route::get('/posts', [
    'uses' => 'PostController@getPostsIndex',
    'as' => 'blog.index',
]);

//Route::post('/posts', [
//    'uses' => 'BlogController@postPostsIndex',
//    'as' => 'blog.index',
//]);

Route::get('/post/{post_id}', [
    'uses' => 'PostController@getSinglePostIndex',
    'as' => 'blog.single',
]);

Route::get('/about', function(){
    return view('frontend.blog.about');
})->name('about');

Route::get('/contact',  [
    'uses' => 'ContactMessageController@getcontactIndex',
    'as' => 'contact',
]);

Route::group([
    'prefix' => '/admin'], function (){
        Route::get('/',  [
            'uses' => 'AdminController@getIndex',
            'as' => 'admin.index', ]);
    }); 
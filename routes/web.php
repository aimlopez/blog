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
/**
 * Admin controllers
 */
Route::group([
    'prefix' => '/admin'], function (){
        Route::get('/',  [
            'uses' => 'AdminController@getIndex',
            'as' => 'admin.index', 
        ]);
        
        Route::get('/posts', [
            'uses' => 'PostController@getAdminPostsIndex',
            'as' => 'admin.posts.index', 
        ]);
        
        Route::get('/post/{post_id}&{end}', [
            'uses' => 'PostController@getSinglePostIndex',
            'as' => 'admin.single', 
        ]);

        Route::get('/posts/create', [
            'uses' => 'PostController@getCreatePost',
            'as' => ('admin.blog.create_post')
        ]);
        Route::post('/post/create', [
            'uses' => 'PostController@store',
            'as' => ('admin.post.create')
        ]);

        Route::get('/post/{post_id}/edit', [
            'uses' => 'PostController@getUpdatePost',
            'as' => ('admin.post.edit')
        ]);

        Route::post('/post/update', [
            'uses' => 'PostController@postUpdatePost',
            'as' => ('admin.post.update')
        ]);

        Route::get('/post/{post_id}/delete', [
            'uses' => 'PostController@destroy',
            'as' => ('admin.delete')
        ]);

        Route::get('/categories', [
            'uses' => 'CategoryController@getPostsCategories',
            'as' => 'admin.categories.index', 
        ]);
    }); 
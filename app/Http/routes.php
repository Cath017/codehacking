<?php

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'PostsController@show']);

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/media', 'PhotosController');
    Route::resource('/comments', 'CommentsController');
    Route::resource('/replies', 'CommentRepliesController');
});




<?php

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

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'PostsController@post']);

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




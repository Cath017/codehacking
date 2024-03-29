<?php
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

// Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'PostsController@show']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index');
    Route::resource('/users', 'AdminUsersController');
    Route::resource('/posts', 'AdminPostsController');
    Route::resource('/categories', 'AdminCategoriesController');
    Route::resource('/media', 'AdminPhotosController');
    Route::resource('/comments', 'AdminCommentsController');
    Route::delete('/delete/media', 'AdminPhotosController@deleteMedia');
});

Route::post('/comments', 'CommentsController@store');
Route::resource('/post', 'PostsController');

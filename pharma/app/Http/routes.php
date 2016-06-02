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

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

 Route::group(['middleware' => ['web']], function () {


		Route::auth();
		Route::get('/', 'HomeController@index');
		//post routes ...
		Route::get('posts/{post}', 'PostsController@show');
		Route::post('posts/add', 'PostsController@store');
		Route::put('edit/{post}', 'PostsController@append');
		Route::get('delete/{post}', 'PostsController@destroy');
		//user routes ...
		Route::get('/users/{User}', 'UsersController@profile');
		Route::get('/users/{User}/editprofile', 'UsersController@edit');
		Route::patch('/users/{User}/update', 'UsersController@update');

        //follow routes ...
        Route::post('/follow/{follower_id}', 'FollowersController@store');
        Route::post('/unfollow/{follower_id}', 'FollowersController@destroy');
	



 }); 


Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index');
});

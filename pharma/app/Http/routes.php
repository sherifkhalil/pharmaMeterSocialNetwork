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

		// Route::get('/', function () {
		//     return view('index');
		// });
		Route::auth();
		Route::get('/', 'HomeController@index');
		#Route::get('/admin','AdminController@index');
		//post routes ...
		Route::get('posts/{post}', 'PostsController@show');
		Route::post('posts/add', 'PostsController@store');
		Route::put('edit/{post}', 'PostsController@append');
		Route::get('delete/{post}', 'PostsController@destroy');

    Route::get('/admin', 'AdminController@index');

	Route::get('/users/{User}', 'UsersController@profile');


 }); 


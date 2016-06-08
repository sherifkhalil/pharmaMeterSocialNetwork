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

		Route::get('/users/{User}', 'UsersController@profile');
		Route::get('/users/{User}/editprofile', 'UsersController@edit');
		Route::patch('/users/{User}/update', 'UsersController@update');


        Route::get('/admin', 'AdminController@index');
        Route::get('/admin/users/delete/{id}', 'AdminController@delete');
        Route::get('/admin/users/restore/{id}', 'AdminController@restore');
        Route::get('/admin/users/generate', 'AdminController@generate');
        Route::post('/admin/users/generate', 'AdminController@generate');

        Route::get('/admin/requests/accept/{id}', 'AccountsController@accept');
        Route::get('/admin/requests/reject/{id}', 'AccountsController@reject');

        Route::post('/request', 'AccountsController@store');
        Route::get('/requests', 'AccountsController@requests');
        Route::get('/requests/accepted', 'AccountsController@accepted');
        Route::get('/requests/accepted', 'AccountsController@accepted');


	



 }); 



// verification token resend form
Route::get('verify/resend', [
    'uses' => 'Auth\VerifyController@showResendForm',
    'as' => 'verification.resend',
]);

// verification token resend action
Route::post('verify/resend', [
    'uses' => 'Auth\VerifyController@sendVerificationLinkEmail',
    'as' => 'verification.resend.post',
]);

// verification message / user verification
Route::get('verify/{token?}', [
    'uses' => 'Auth\VerifyController@verify',
    'as' => 'verification.verify',
]);
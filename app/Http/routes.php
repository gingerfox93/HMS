<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    //Route::get('/profile', 'ProfileController@viewProfile');
    
    //Route::get('/profile/{id}', 'ProfileController@viewProfile')->where('id', '[0-9]+');
    
    Route::post('/profile/search', 'ProfileController@SearchProfile');

    Route::controller('datatables', 'DatatablesController', [
	    'anyData'  => 'datatables.data',
	    'getIndex' => 'datatables',
	]);

	Route::resource('profile', 'ProfileController');

});

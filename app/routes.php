<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showHome'));

Route::post('/', array('as' => 'login', 'uses' => 'AuthController@login'));



Route::group(array('before' => 'auth'), function() {

	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'UserController@showDashboard'));

	Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {

		Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'AdminController@showDashboard'));
		
	});
});

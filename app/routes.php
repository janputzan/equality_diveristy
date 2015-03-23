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

Route::get('activate/{code?}', array('as' => 'activate', 'uses' => 'UserController@activate'));
Route::post('activate/{code?}', array('as' => 'setPassword', 'uses' => 'UserController@storePassword'));



Route::group(array('before' => 'auth'), function() {

	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'UserController@showDashboard'));

	Route::group(array('prefix' => 'manager', 'before' => 'manager'), function() {

		Route::get('dashboard', array('as' => 'manager.dashboard', 'uses' => 'ManagerController@showDashboard'));

		Route::group(array('prefix' => 'users'), function() {

			Route::get('/', array('as' => 'manager.users.index', 'uses' => 'ManagerController@showUsers'));

			Route::get('add', array('as' => 'manager.users.add', 'uses' => 'ManagerController@addUsers'));
			
			Route::post('add', array('as' => 'manager.users.store', 'uses' => 'ManagerController@storeUsers'));
		});
	});

	Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {

		Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'AdminController@showDashboard'));

		Route::group(array('prefix' => 'users'), function() {

			Route::get('/', array('as' => 'admin.users.index', 'uses' => 'AdminController@showUsers'));

			Route::get('add', array('as' => 'admin.users.add', 'uses' => 'AdminController@addUsers'));
			
			Route::post('add', array('as' => 'admin.users.store', 'uses' => 'AdminController@storeUsers'));
		});

		Route::group(array('prefix' => 'departments'), function() {

			Route::get('/', array('as' => 'admin.departments.index', 'uses' => 'AdminController@showDepartments'));

			Route::get('/add', array('as' => 'admin.departments.add', 'uses' => 'AdminController@addDepartments'));

			Route::post('/add', array('as' => 'admin.departments.store', 'uses' => 'AdminController@storeDepartments'));
		});

		Route::group(array('prefix' => 'questions'), function() {

			Route::get('/', array('as' => 'admin.questions.index', 'uses' => 'AdminController@showQuestions'));

			Route::get('/add', array('as' => 'admin.questions.add', 'uses' => 'AdminController@addQuestions'));

			Route::post('/add', array('as' => 'admin.questions.store', 'uses' => 'AdminController@storeQuestions'));

			Route::post('/add/answers', array('as' => 'admin.answers.store', 'uses' => 'AdminController@storeAnswers'));

		});
		
	});
});

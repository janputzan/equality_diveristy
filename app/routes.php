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

Route::get('404', array('as' => 'show404', 'uses' => 'HomeController@show404'));

Route::get('home', array('as' => 'home', 'uses' => 'HomeController@redirectHome'));

Route::group(array('before' => 'guest'), function() {

	Route::get('/', array('as' => 'showLogin', 'uses' => 'HomeController@showLogin'));

	Route::post('/', array('as' => 'postLogin', 'uses' => 'AuthController@login'));
	
	Route::get('activate/{code?}', array('as' => 'activate', 'uses' => 'UserController@activate'));
	
	Route::post('activate/{code?}', array('as' => 'setPassword', 'uses' => 'UserController@storePassword'));
});

Route::group(array('before' => 'auth'), function() {

	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

	Route::get('dashboard', array('as' => 'user.dashboard', 'uses' => 'UserController@showDashboard'));

	Route::group(array('prefix' => 'test'), function() {

		Route::get('showStart', array('as' => 'test.showStart', 'uses' => 'TestController@showStart'));

		// Route::post('showStart', array('as' => 'test.startTest', 'uses' => 'TestController@startTest'));

		Route::post('next', array('as' => 'test.nextQuestion', 'uses' => 'TestController@nextQuestion'));
	});

	Route::group(array('prefix' => 'manager', 'before' => 'manager'), function() {

		Route::get('dashboard', array('as' => 'manager.dashboard', 'uses' => 'ManagerController@showDashboard'));

		Route::group(array('prefix' => 'users'), function() {

			Route::get('/', array('as' => 'manager.users.index', 'uses' => 'ManagerController@showUsers'));

			Route::get('add', array('as' => 'manager.users.add', 'uses' => 'ManagerController@addUsers'));
			
			Route::post('add', array('as' => 'manager.users.store', 'uses' => 'ManagerController@storeUsers'));
		});

		Route::group(array('prefix' => 'results'), function() {

			Route::get('/', array('as' => 'manager.results.show', 'uses' => 'ResultsController@managerShow'));

			Route::get('/get', array('as' => 'manager.results.get', 'uses' => 'ResultsController@managerGet'));
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

		Route::group(array('prefix' => 'results'), function() {

			Route::get('/', array('as' => 'admin.results.show', 'uses' => 'ResultsController@adminShow'));

			Route::get('/get', array('as' => 'admin.results.get', 'uses' => 'ResultsController@adminGet'));
		});
		
	});
});

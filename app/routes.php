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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);

Route::post('/', ['as' => 'login', 'uses' => 'AuthController@login']);

Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@showDashboard']);

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'UserController@showDashboard']);
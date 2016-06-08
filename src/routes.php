<?php

Route::group(['middleware' => ['web'] ], function () {    
	
	Route::get('login', 	['as'  	=> 'login', 	'uses' => 'Jsd\Blog\Http\Controllers\Auth\AuthController@getLogin']);
	Route::post('login', 	['as' 	=> 'login', 	'uses' => 'Jsd\Blog\Http\Controllers\Auth\AuthController@postLogin']);
	Route::get('logout', 	['as'  	=> 'logout', 	'uses' => 'Jsd\Blog\Http\Controllers\Auth\AuthController@getLogout']);

	Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function () {
	    Route::get('/', 			'Jsd\Blog\Http\Controllers\Admin\AdminController@index');
	    Route::resource('user', 	'Jsd\Blog\Http\Controllers\Admin\UserController');
	    Route::resource('post', 	'Jsd\Blog\Http\Controllers\Admin\PostController');
	    Route::resource('page', 	'Jsd\Blog\Http\Controllers\Admin\PageController');
	});		
});

Route::resource('blog', 'Jsd\Blog\Http\Controllers\BlogController');
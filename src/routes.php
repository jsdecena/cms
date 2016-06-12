<?php

Route::group(['middleware' => ['web'] ], function () {    
	
	Route::get('login', 	['as'  	=> 'login', 	'uses' => 'Jsdecena\Blog\Http\Controllers\Auth\AuthController@getLogin']);
	Route::post('login', 	['as' 	=> 'login', 	'uses' => 'Jsdecena\Blog\Http\Controllers\Auth\AuthController@postLogin']);
	Route::get('logout', 	['as'  	=> 'logout', 	'uses' => 'Jsdecena\Blog\Http\Controllers\Auth\AuthController@getLogout']);

	Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function () {
	    Route::get('/', 			'Jsdecena\Blog\Http\Controllers\Admin\AdminController@index');
	    Route::resource('user', 	'Jsdecena\Blog\Http\Controllers\Admin\UserController');
	    Route::resource('post', 	'Jsdecena\Blog\Http\Controllers\Admin\PostController');
	    Route::resource('page', 	'Jsdecena\Blog\Http\Controllers\Admin\PageController');
	    Route::resource('category', 'Jsdecena\Blog\Http\Controllers\Admin\CategoryController');
	});		
});

Route::resource('blog', 'Jsdecena\Blog\Http\Controllers\BlogController');
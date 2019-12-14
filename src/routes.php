<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    Route::get('login', ['as' => 'login', 'uses' => 'Jsdecena\Cms\Http\Controllers\Auth\AuthController@showLoginForm']);
    Route::post('login', ['as' => 'login', 'uses' => 'Jsdecena\Cms\Http\Controllers\Auth\AuthController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Jsdecena\Cms\Http\Controllers\Auth\AuthController@getLogout']);

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
        Route::resource('home', 'Jsdecena\Cms\Http\Controllers\Admin\AdminController')->only('index');
        Route::resource('user', 'Jsdecena\Cms\Http\Controllers\Admin\UserController');
        Route::resource('post', 'Jsdecena\Cms\Http\Controllers\Admin\PostController');
        Route::resource('page', 'Jsdecena\Cms\Http\Controllers\Admin\PageController');
        Route::resource('category', 'Jsdecena\Cms\Http\Controllers\Admin\CategoryController');
    });
});

Route::resource('blog', 'Jsdecena\Cms\Http\Controllers\CmsController');

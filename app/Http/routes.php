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

    Route::get('/', 'WelcomeController@index');
    Route::get('home', 'HomeController@index');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function ()
    {
        Route::group(['prefix' => 'categories'], function ()
        {
            Route::get('', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
            Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
            Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
            Route::get('{category}/show', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
            Route::get('{category}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
            Route::get('{category}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
            Route::put('{category}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        });

        Route::group(['prefix' => 'products'], function ()
        {
            Route::get('', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
            Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
            Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
            Route::get('{product}/show', ['as' => 'products.show', 'uses' => 'ProductsController@show']);
            Route::get('{product}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
            Route::get('{product}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
            Route::put('{product}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        });
    });


    Route::controllers([
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

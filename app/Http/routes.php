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

    Route::group(['namespace' => 'Admin'], function ()
    {
        Route::group(['prefix' => 'admin'], function ()
        {
            Route::group(['prefix' => 'categories'], function ()
            {
                Route::get('/', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
                Route::get('/{category}', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
                Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
                Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
                Route::put('/{category}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
                Route::delete('/{category}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@delete']);
            });

            Route::group(['prefix' => 'products'], function ()
            {
                Route::get('/', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
                Route::get('/{product}', ['as' => 'products.show', 'uses' => 'ProductsController@show']);
                Route::get('/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
                Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
                Route::put('/{product}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
                Route::delete('/{product}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
            });
        });
    });


    Route::controllers([
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

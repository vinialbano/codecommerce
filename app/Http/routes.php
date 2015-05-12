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
                Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
                Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
                Route::get('/{category}', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
                Route::get('/{category}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
                Route::put('/{category}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
                Route::get('/{category}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
            });

            Route::group(['prefix' => 'products'], function ()
            {
                Route::get('/', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
                Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
                Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
                Route::get('/{product}', ['as' => 'products.show', 'uses' => 'ProductsController@show']);
                Route::get('/{product}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
                Route::put('/{product}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
                Route::get('/{product}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
            });
        });
    });


    Route::controllers([
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

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

    Route::get('', ['as' => 'store.index', 'uses' => 'StoreController@index']);
    Route::get('home', ['as' => 'home', 'uses' => 'StoreController@index']);

    /* Store routes */
    Route::group(['prefix' => 'store'], function(){
        Route::get('category/{category}', ['as' => 'store.categories', 'uses' => 'StoreController@category']);
        Route::get('product/{product}', ['as' => 'store.products', 'uses' => 'StoreController@product']);
        Route::get('tag/{tag}', ['as' => 'store.tags', 'uses' => 'StoreController@tag']);
    });

    /* Cart routes */
    Route::group(['prefix' => 'cart'], function(){
        Route::get('', ['as' => 'cart', 'uses' => 'CartController@index']);
        Route::get('add/{product}/{quantity}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
        Route::get('update/{product}/{quantity}', ['as' => 'cart.update', 'uses' => 'CartController@update']);
        Route::get('destroy/{product}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    });

    /* Auth routes */
    Route::group(['middleware' => 'auth'], function(){

        /* Checkout routes */
        Route::group(['prefix' => 'checkout'], function(){
            Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place', 'middleware' => 'auth']);
        }); /* End checkout routes */

        /* Account routes */
        Route::group(['prefix' => 'account'], function(){
            Route::get('orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

        }); /* End account routes */

        /* Admin routes */
        Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

            /* Categories routes */
            Route::group(['prefix' => 'categories'], function () {
                Route::get('', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
                Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
                Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
                Route::get('{category}/show', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
                Route::get('{category}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
                Route::get('{category}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
                Route::put('{category}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
            }); /* End categories routes */

            /* Products routes */
            Route::group(['prefix' => 'products'], function () {
                Route::get('', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
                Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
                Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
                Route::get('{product}/show', ['as' => 'products.show', 'uses' => 'ProductsController@show']);
                Route::get('{product}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
                Route::get('{product}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
                Route::put('{product}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

                /* Product images routes */
                Route::group(['prefix' => '{product}/images'], function () {
                    Route::get('', ['as' => 'products.images', 'uses' => 'ProductsController@showImages']);
                    Route::get('create', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
                    Route::get('{productImage}/destroy', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
                    Route::post('store', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
                }); /* End product images routes */
            }); /* End products routes */

        }); /* End admin routes */
    }); /* End auth routes */

    Route::controllers([
        'auth'     => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

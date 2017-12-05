<?php

use App\Product;

//Products
Route::get('/products', 'ProductsController@index');

Route::get('/products/create', 'ProductsController@create');

Route::get('/products/delete', 'ProductsController@showDelete');

Route::get('/products/{product}', 'ProductsController@show');

Route::post('/products', 'ProductsController@store');

Route::delete('/products/delete/{product}', ['uses' => 'ProductsController@delete', 'as' => 'products.delete']);

Route::get('/products/addToCart/{product}', 'ProductsController@setCartItem');

//Cart
Route::get('/cart', 'CartController@index');

Route::get('/cart/removeCartItem/{product}', 'CartController@removeCartItem');

Route::get('/cart/addCartItem/{product}', 'CartController@addCartItem');

Route::post('/confirmation', 'CartController@checkout');

//Admin
Route::get('/admin', function(){
    //Counter
        if(Session::get('cart.items'))
            $counter = count(Session::get('cart.items'));
        else 
            $counter = 0;
    //Counter
    return view('admin.index', compact('counter'));
});

//Orders
Route::get('/orders', 'OrdersController@index');

Route::get('/orders/{order}', 'OrdersController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {

    //$products = DB::table('products')->get();
    $products = Product::all();

    return view('products.index', compact('products'));
});

Route::get('/products/{product}', function ($id) {
    
        //$product = DB::table('products')->find($id);
        $product = Product::find($id);

        return view('products.view', compact('product'));
        
    });
    
<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    public function index()
    {
        //Counter
        if(Session::get('cart.items'))
            $counter = count(Session::get('cart.items'));
        else 
            $counter = 0;
        //Counter
        //$products = DB::table('products')->get();
        $products = Product::all();

        return view('products.index', compact('products', 'counter'));
    }

    public function create()
    {
        return view('products.create', compact('counter'));
    }

    public function store()
    {
        $product = new Product;

        $product->name = request('name');

        $product->price = request('price');

        $product->img_url = request('img_url');

        $product->save();

        return redirect('/products');
        
    }

    public function delete(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();

        return redirect('/products/delete');
    }

    public function setCartItem (Product $product) {
        if(Session::get('cart.items')){
            $cart = Session::get('cart.items');
            if(($key = array_search($product->id, $cart)) === false) {
                Session::push('cart.items', $product->id);
            } 
        } else {
            Session::push('cart.items', $product->id);
        }
        return redirect('/products');
    }

    public function show(Product $product)
    {
        //Counter
        if(Session::get('cart.items'))
            $counter = count(Session::get('cart.items'));
        else 
            $counter = 0;
        //Counter

         return view('products.view', compact('product', 'counter'));
    }

    public function showDelete(Product $product)
    {
        $products = new Product;
        $products = Product::all();
        
         return view('products.delete', compact('products'));
    }

    public function addToCart(Product $product)
    {
        $counter++;
         return;
    }
}

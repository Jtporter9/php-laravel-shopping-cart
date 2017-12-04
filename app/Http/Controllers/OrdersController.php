<?php

namespace App\Http\Controllers;
use App\Product;
use App\Payment;
use App\Shipping;
use App\OrderedProduct;
use App\Order;
use Illuminate\Http\Request;
use Mail;
use Session;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        $orderedProducts = OrderedProduct::where('order_id', $order->id)->get();
        $payment = Payment::where('id', $order->payment_id)->get();
        $shipping = Shipping::where('id', $order->shipping_id)->get();
        $cart = array();

        foreach($orderedProducts as $product){
            array_push($cart, $product->product_id);
        }
        $products = Product::findMany($cart);
        return view('orders.view', compact('order', 'products', 'payment', 'shipping'));
    }

}

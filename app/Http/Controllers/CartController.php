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

class CartController extends Controller
{
    public function index()
    {
        //Counter
        if(Session::get('cart.items')){
            $cart = Session::get('cart.items');
            $counter = count($cart);
            $products = Product::findMany($cart);
        //Counter
            }
            else {
                $counter = 0;
                $products = array();
            }

        return view('cart.index', compact('products','counter'));
    }

    public function removeCartItem (Product $product) {
        $cart = Session::get('cart.items');
        if (($key = array_search($product->id, $cart)) !== false) {
            unset($cart[$key]);
        }
        echo $product->id;
        print_r($cart);
        Session::pull('cart.items', 'default');
        Session::put('cart.items', $cart);
        
        return redirect('/cart');
    }

    public function addCartItem (Product $product) {
        Session::push('cart.items', $product->id);
        
        return redirect('/cart');
    }

    public function checkout (Request $request) {
        $cart = Session::get('cart.items');
        $counter = count($cart);
        //Counter
        $products = Product::findMany($cart);
        
        $payment = $this->storePayment();
        $shipping = $this->storeShipping();
        $order = $this->storeOrder($payment, $shipping);
        $this->storeOrderedProducts($products, $order);
        
        //Trying to send an email
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Hot Suace Saucey Sauce <jtporter9@gmail.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

        $to = request('email');
        $subject = "Thank you for your Saucey Purchase";

        $message = "Thank you for your purchase! The following info was submitted\n\n Total: "
        . request('total') ."\nName: "
        . request('name') ."\nShipping Address: "
        . request('addresss') ."\nCity: "   
        . request('city') ."\nState: "
        . request('state') ."\nZip Code: "
        . request('zip');
    // SEND THE EMAIL 
        $email = mail($to, $subject, $message, $headers);  
        
        if ($foo)
        {
            echo "sent";
        }
        else {
            echo "failed";
        }

        // $data = [
        //     'key'     => 'value'
        // ];

        // Mail::send(['text'=>'cart.email'], $data, function ($message) {
        //     $message->from('jtporter9@gmail.com', "Tanner Porter");
        //     $message->subject('Your Sauce Purcahse');
        //     $message->to(request('email'));
        // });

        Session::pull('cart.items', 'default');
        //Clears Session Storage and Cart
        return view('cart.confirmation', compact('request','counter','products'));
    }

    private function storePayment(){
        $payment = new Payment;
        $payment->card_holder = request('card_name');
        $payment->card_number = request('card_number');
        $payment->expiration = request('expiration');
        $payment->cvv = request('cvv');

        $payment->save();
        return $payment;
    }
    
    private function storeShipping(){
        $shipping = new Shipping;
        $shipping->name = request('name');
        $shipping->address = request('address');
        $shipping->city = request('city');
        $shipping->state = request('state');
        $shipping->zip = request('zip');

        $shipping->save();
        return $shipping;
    }
    
    private function storeOrder($payment, $shipping){
        $order = new Order;
        $order->payment_id = $payment->id;
        $order->shipping_id = $shipping->id;
        $order->total = request('total');

        $order->save();
        return $order;
    }

    private function storeOrderedProducts($products, $order){
        
        foreach ($products as $product) {
            $orderedProducts = new OrderedProduct;
            $orderedProducts->product_id = $product->id;
            $orderedProducts->order_id = $order->id;
            $orderedProducts->save();
        }
    }

}

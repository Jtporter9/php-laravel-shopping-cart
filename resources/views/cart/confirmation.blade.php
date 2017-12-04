@extends('layouts.layout')

@section('content')
    <h1>Confirmation Page</h1>
    <h2>Thank you for your Purchase!</h2>
    <div class="products-container">
        <div style="display:flex;justify-content:space-between;">
            <div style="text-align:left;width:50%;">
                <p>
                    An confirmation email was send to 
                    <span style="text-decoration:underline;">{{ $request->email }}</span>
                    with the following details.
                </p>
                <h3>Shipping Info</h3>
                <li>Name: {{ $request->name }}</li>
                <li>Address: {{ $request->address }}</li>
                <li>City: {{ $request->city }}</li>
                <li>State: {{ $request->state }}</li>
                <li>Zip Code: {{ $request->zip }}</li>
                <h3>Billing Info</h3>
                <li>Name on Card: {{ $request->card_name }}</li>
                <li>Card Number: {{ $request->card_number }}</li>
                <li>Expiration: {{ $request->expiration }}</li>
                <li>CVV: {{ $request->cvv }}</li>
            </div>
            <div style="width:50%;">
                <p>
                <h2 class="cart-items">Items in cart</h2>
                    @foreach ($products as $product)
                        <div class="cart-items">
                            <img style="max-height:100px;" src="{{ $product->img_url }}"/>
                            <p>
                                {{ $product->name }}  (1)      
                            </p>
                            <p>
                                Price: ${{ number_format(($product->price /100), 2, '.', ' ') }}        
                            </p>
                        </div>
                    @endforeach
                        <div style="padding:0px 10px;" class="cart-items">
                            <h3>Total:</h3>
                            <span>${{ number_format(($request->total /100), 2, '.', ' ') }}</span>
                        </div>
                </p>
            </div> 
        </div>
        <div style="text-align:center;"><a href="/products"><button class="btn-blue">HOME</button></a></div>
    </div>
@endsection
@extends('layouts.adminLayout')

@section('content')
    <div class="products-container">
        <h1 style="margin:0;">Order ID: {{ $order->id }}</h1>
        <div class="inner-container">
            <div style="width:100%">
                <p>
                    Total: $ {{ number_format(($order->total /100), 2, '.', ' ') }}        
                </p>
            </div>
        </div>
        @foreach ($products as $product)
            <div class="cart-items">
                <img style="max-height:100px;" src="{{ $product->img_url }}"/>
                <p>
                    {{ $product->name }}        
                </p>
                <p>
                    Price: $ {{ number_format(($product->price /100), 2, '.', ' ') }}        
                </p>
            </div>
        @endforeach
        <h3>Shipping Info</h3>
        @foreach($shipping as $address)
        <div class="cart-items">
            <p>
                Name: {{ $address->name }}
            </p>
            <p>
                Address: {{ $address->address }}
            </p>
            <p>
                City: {{ $address->city }}
            </p>
            <p>
                State: {{ $address->state }}
            </p>
            <p>
                Zip Code: {{ $address->zip }}
            </p>
        </div>
        @endforeach
        <h3>Payment Info</h3>
        @foreach($payment as $paymentInfo)
        <div class="cart-items">
            <p>
                Card Holder: {{ $paymentInfo->card_holder }}
            </p>
            <p>
                Card Number: {{ $paymentInfo->card_number }}
            </p>
            <p>
                Expiration: {{ $paymentInfo->expiration }}
            </p>
            <p>
                CVV: {{ $paymentInfo->cvv }}
            </p>
        </div>
        @endforeach
    </div>
@endsection




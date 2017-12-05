<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thank you for your purchase</h1>
    <div>
        <h3>Total: ${{ number_format(( $request['total'] /100), 2, '.', ' ') }}</h3>
    </div>
    <div class="products-container">
        <div style="display:flex;justify-content:space-between;">
            <div style="text-align:left;width:50%;">
                <p>
                    An confirmation email was send to 
                    <span style="text-decoration:underline;">{{ $request['email'] }}</span>
                    with the following details.
                </p>
                <h3>Shipping Info</h3>
                <li>Name: {{ $request['name'] }}</li>
                <li>Address: {{ $request['address'] }}</li>
                <li>City: {{ $request['city'] }}</li>
                <li>State: {{ $request['state'] }}</li>
                <li>Zip Code: {{ $request['zip'] }}</li>
                <h3>Billing Info</h3>
                <li>Name on Card: {{ $request['card_name'] }}</li>
                <li>Card Number: {{ $request['card_number'] }}</li>
                <li>Expiration: {{ $request['expiration'] }}</li>
                <li>CVV: {{ $request['cvv'] }}</li>
            </div>
            <div style="width:50%;">
                @foreach ($products as $product)
                <div class="cart-items">
                    <img style="max-height:100px;" src="{{ $product->img_url }}"/>
                    <span>
                        {{ $product->name }}  (1)      
                    </span>
                    <span>
                        Price: ${{ number_format(($product->price /100), 2, '.', ' ') }}        
                    </span>
                </div>
                @endforeach
                <div style="padding:0px 10px;" class="cart-items">
                    <big>Total:</big>
                    <span>${{ number_format(($request['total'] /100), 2, '.', ' ') }}</span>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
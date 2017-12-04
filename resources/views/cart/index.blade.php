@extends('layouts.layout')

@section('content')
            <h1>Shopping Cart</h1>
            <div class="products-container">
            <h2 class="cart-items">Items in cart</h2>
            <?php
                if (count($products) == 0) {
                    echo "<div class='error-message'>Please Add items to the cart first.</div>";
                }
            ?>
                    @foreach ($products as $product)
                        <div class="cart-items">
                            <img style="max-height:100px;" src="{{ $product->img_url }}"/>
                            <p>
                                {{ $product->name }}        
                            </p>
                            <p>
                                Price: $ {{ number_format(($product->price /100), 2, '.', ' ') }}        
                            </p>
                            <a href="/cart/removeCartItem/{{$product->id}}">
                                <button class="btn-red" style="height:35px;">REMOVE</button>
                            </a>
                        </div>
                    @endforeach
                <div style="padding:0px 10px;" class="cart-items">
                    <h4>Sub total:</h4>
                    <?php
                    $total = 0;
                        foreach ($products as $product) {
                            $total += $product->price; 
                        }
                        echo '$' . number_format(($total /100), 2, '.', ' ')
                    ?>
                </div>
                <div style="padding:0px 10px;" class="cart-items">
                    <h4>Tax: (7%)</h4>
                    <?php
                    $tax = $total * 0.07;
                        echo '$' . number_format(($tax /100), 2, '.', ' ')
                    ?>
                </div>
                <div style="padding:0px 10px;" class="cart-items">
                    <h4>Shipping: (Flat Rate)</h4>
                    <?php
                    $shipping = 500;
                        echo '$' . number_format(($shipping /100), 2, '.', ' ')
                    ?>
                </div>
                <div style="padding:0px 10px;" class="cart-items">
                    <h3>Total:</h3>
                    <?php
                    $total = $total + $tax + $shipping;
                        echo '$' . number_format(($total /100), 2, '.', ' ')
                    ?>
                </div>
                    <form style="padding:0px;" class="form-container" method="POST" action="/confirmation">
                        {{ csrf_field() }}
                        <input type="hidden" name="total" value="{{ $total }}">
                        <div style="text-align:center;"><h3>Shipping Info</h3></div>
                        <div class="form-shipping-info">
                            <input placeholder="name" type="text" name="name" required>
                            <input placeholder="email@email.com" type="email" name="email" required>
                            <input placeholder="address" type="text" name="address" required>
                        </div>
                        <div class="form-shipping-info">
                            <input placeholder="city" type="text" name="city" required>
                            <input placeholder="state" type="text" name="state" required>
                            <input placeholder="zip code" type="text" name="zip" required>
                        </div>
                        <div style="text-align:center;"><h3>Card Info</h3></div>
                        <div class="form-shipping-info">
                            <input style="width:50%;" placeholder="name on card" type="text" name="card_name" required>
                            <input style="width:50%;" placeholder="card number" type="text" name="card_number" required>
                        </div>
                        <div class="form-shipping-info">
                            <input style="width:50%;" placeholder="Exp: 07/21" type="text" name="expiration" required>
                            <input style="width:50%;" placeholder="cvv" type="text" name="cvv" required>
                        </div>
                        <div style="text-align:center;margin:50px 0;">
                            <button style="width:300px;" type="submit" class="btn-blue">CONFIRM</button>
                        </div>
                    </form>
                </div>

            </div>
@endsection
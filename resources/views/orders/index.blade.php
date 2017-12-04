@extends('layouts.adminLayout')

@section('content')
            <h1>Orders Page</h1>
             @foreach ($orders as $order)
                <a style="text-decoration:none;" href="/orders/{{ $order->id }}">
                    <div class="cart-items pointer">
                        <p>
                            ID: {{ $order->id }}        
                        </p>
                        <p>
                            Total: $ {{ number_format(($order->total /100), 2, '.', ' ') }}        
                        </p>
                        <p>
                            Date/Time: {{ $order->created_at }}
                        </p>
                    </div>
                </a>
            @endforeach
@endsection
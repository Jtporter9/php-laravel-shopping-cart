@extends('layouts.adminLayout')

@section('content')
            <h1>Products List</h1>
            <div class="products-container">
            <h2 class="cart-items">Items in cart</h2>
                    @foreach ($products as $product)
                        <div class="cart-items">
                            <img style="max-height:100px;" src="{{ $product->img_url }}"/>
                            <p>
                                {{ $product->name }}        
                            </p>
                            <p>
                                Price: $ {{ number_format(($product->price /100), 2, '.', ' ') }}        
                            </p>
                            <form action="/products/delete/{{$product->id}}" method="POST">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE') }}
                                <button class="btn-red" type="submit" style="height:35px;">REMOVE</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
@endsection
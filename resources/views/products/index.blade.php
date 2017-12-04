@extends('layouts.layout')

@section('content')
                    <h1>Products</h1>
            <div class="products-container">
                <div class="inner-container">
                    @foreach ($products as $product)
                        <div class="product">
                            <a href="products/{{ $product->id }}">
                                <img style="max-height:200px;" src="{{ $product->img_url }}"/>
                                <p>
                                    {{ $product->name }}        
                                </p>
                                <p>
                                    Price: $ {{ number_format(($product->price /100), 2, '.', ' ') }}        
                                </p>
                            </a>
                            <a href="products/addToCart/{{ $product->id }}">
                                <button class="btn-blue">Add to Cart</button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
@endsection

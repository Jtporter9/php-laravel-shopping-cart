@extends('layouts.layout')

@section('content')
    <div class="products-container">
        <div class="inner-container">
            <div class="product" style="width:100%">
                <a href="products/{{ $product->id }}">
                    <img style="max-height:200px;" src="{{ $product->img_url }}"/>
                    <h2>{{ $product->name }}</h2>
                    <p>
                        Price: $ {{ number_format(($product->price /100), 2, '.', ' ') }}        
                    </p>
                </a>
                <button on-click="" class="btn-blue">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection




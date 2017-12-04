@extends('layouts.adminLayout')

@section('content')
                    <h1>Add a new Product</h1>
                    <hr>
                    <form class="form-container"method="POST" action="/products">
                        {{ csrf_field() }}
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div>
                            <label for="price">Price:</label>
                            <input type="text" name="price" required>
                        </div>
                        <div>
                            <label for="img_url">Image Url:</label>
                            <input type="text" name="img_url" required>
                        </div>
                        <button type="submit" class="btn-blue">Submit</button>
                    </form>
@endsection

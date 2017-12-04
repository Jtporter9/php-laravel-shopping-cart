<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping Cart Laravel</title>

        {{--  Styles  --}}
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>

        <header>
            <div class="flex-center position-ref">
                <div class="content">
                    <div class="title m-b-md">
                        Shopping Cart Proj
                    </div>

                    <div class="links">
                        <a href="/products">Products</a>
                        <a href="/admin">Admin</a>
                        <a href="/products/create">Add a Product</a>
                        <a href="/products/delete">Delete a Product</a>
                        <a href="/orders">View Orders</a>

                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://use.fontawesome.com/61a97cdaee.js"></script>
    </body>
</html>
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
    <?php
        // Username and password for authentification
        $username = 'admin';
        $password = 'password';

        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        ($_SERVER['PHP_AUTH_USER']) != $username || ($_SERVER['PHP_AUTH_PW']) != $password) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Up2Date"');
        exit('<h2>Incorrect username and or password</h2>');
        };
        
        ?>

        <header>
            <div class="flex-center position-ref">
                <div class="content">
                    <div class="title m-b-md">
                        Shopping Cart Proj
                    </div>

                    <div class="links">
                        <a href="/products">Client Side</a>
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
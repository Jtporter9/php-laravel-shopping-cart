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

        @include('layouts.nav')

        <div class="container">
            @yield('content')
        </div>

        <script src="https://use.fontawesome.com/61a97cdaee.js"></script>
    </body>
</html>
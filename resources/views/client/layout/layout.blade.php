<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('bootstrap4/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap4/style.css') }}">
        <script src="https://kit.fontawesome.com/1d954ea888.js"></script>
        <title>@yield('title')</title>
        @livewireStyles
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('bootstrap4/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('bootstrap4/bootstrap.min.js') }}"></script>
        @livewireScripts
    </body>
</html>
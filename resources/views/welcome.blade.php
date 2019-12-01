<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container p-8 mx-auto">
            @include('partials.navBar')
            @yield('content')
        </div>
    </body>
</html>

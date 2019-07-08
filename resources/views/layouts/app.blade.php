<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name','Laravel') }}</title>
    <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    @yield('style')
</head>
<body id="app-layout">
    @include('layouts.partial.navigation')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    @include('layouts.partial.footer')

    <script src="{{ elixir("js/app.js") }}"></script>
    @yield('script')
</body>
</html>
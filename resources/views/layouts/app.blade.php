<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
</head>
<body>
<div class="container-fluid">
    @include('layouts.header')
</div>
<div class="container-md">
    <div class="d-flex flex-nowrap">
        <div class="sidebar border border-2 col-3" style="height: calc(100vh - 3rem)">
            @include('layouts.sidebar')
        </div>
        <div class="border border-2 col container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<div id="footer">
    @include('layouts.footer')
</div>
@stack('scripts')
</body>

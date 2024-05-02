<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ Session::get('theme') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/public/dist/img/AdminLTELogo.png">
    <link rel="stylesheet" href="{{ asset('css/mishka-mebel.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css')  }}">
    @vite(['resources/js/default.js'])
</head>
<body>
    @yield('content')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Storefront')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('layouts.header')      {{-- Gọi phần header --}}
    
    <main>
        @yield('content')            {{-- Nội dung chính của từng trang --}}
    </main>
    
    @include('layouts.footer')      {{-- Gọi phần footer --}}
</body>
</html>

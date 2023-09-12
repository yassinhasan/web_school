<?php 
use Illuminate\Support\Facades\Route;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/nav2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layouts/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/layouts/nav.css') }}" rel="stylesheet"> -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    @include('home.layouts.navbar2')

        <div class="auth-wraper">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
                <h1 style="font-size: 2rem; font-weight:bold">
                    {{ ucfirst(str_replace('.',' ' ,Route::currentRouteName()) )}}
                </h1>
    

                <a href="/"><img src="{{ url('images/logo.png') }}" width="100px"></a>
            

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        </div>

        <!-- @include("home.layouts.footer") -->
        <script src="{{ asset('js/layouts/nav2.js') }}" ></script>

    </body>
</html>

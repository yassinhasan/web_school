<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- fontawsome -->
    <!-- Fonts -->
    <!-- bootstrap and fontawsome -->
    <!-- fontawsome -->
<link href="{{ asset('css/assets/all.min.css?GYJH') }}" rel="stylesheet">
<!-- bootstrap -->
<link href="{{ asset('css/assets/bootstrap.min.css?GYJH') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/nav2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/spinner.css?GYJH') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/toast-session.css?jh') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/toast.css?jh') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/settings.css?sad') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/profile.css?sad') }}" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->

</head>

<body class="font-sans antialiased">
    @include('layouts.navbar2')

    <!-- Page Content -->
    <div class="container">
        <div class="bg-gray-100  profile-wraper">
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white  profile-head">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
        </div>
        {{ $slot }}
    </div>
    @if (Session::has('status'))
    @include("layouts.toast-session")
    @endif

    <!-- session -->
    @include("layouts.spinner")
    @include("layouts.toast")
    @include("layouts.settings")
    <!-- bootstrap and css -->
    <script src="{{ asset('js/assets/jquery-3.7.1.min.map') }}"></script>
    <script src="{{ asset('js/assets/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/layouts/nav2.js') }}"></script>
    <script src="{{ asset('js/layouts/toast.js') }}"></script>
    <script src="{{ asset('js/layouts/spinner.js') }}"></script>
    <script src="{{ asset('js/layouts/settings.js') }}"></script>
    <script src="{{ asset('js/auth/profile.js') }}"></script>

</body>

</html>
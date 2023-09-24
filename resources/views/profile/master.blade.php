<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- bootstrap and fontawsome -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/layouts/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/nav2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/spinner.css?GYJH') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/toast.css?GYJH') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/settings.css?sad') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/profile.css?sad') }}" rel="stylesheet">


    <!-- Scripts -->

</head>

<body class="font-sans antialiased">
@include('home.layouts.navbar2')
    <div class="min-h-screen bg-gray-100  profile-wraper">
        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow profile-head">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    
    @if (Session::has('status'))
    @section('message')
    {{ Session::get('status') }}
    @endsection()
    @include("home.layouts.toast-session")
    @endif
    @include("home.layouts.toast")
    @include("home.layouts.spinner")
    @include("home.layouts.settings")
    <!-- bootstrap and css -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/layouts/nav2.js') }}"></script>
    <script src="{{ asset('js/layouts/spinner.js') }}"></script>
    <script src="{{ asset('js/layouts/toast.js') }}"></script>
    <script src="{{ asset('js/layouts/settings.js') }}"></script>
    <script src="{{ asset('js/auth/profile.js') }}"></script>

</body>

</html>
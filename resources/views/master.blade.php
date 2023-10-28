<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 CSS JAVASCRIPT" />
    <meta name="description" content="My Heroes Make Awesome Webiste" />
    <meta name="author" content="Hasan mEADY" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>


    @yield("navbar")
    <!-- main-content -->
    <div class="container">

        @yield('page-header')
        @yield('content')
        @yield('background-dot')
        @yield('editor')
        @include("layouts.spinner")
        @include("layouts.toast")
        @include("layouts.settings")

    </div>

    <!-- footer -->
    @yield("footer")
    <!-- end footer -->

    <!--   === footer scripts -->
    @include('layouts.footer-scripts')
    <!--   === footer scripts -->

        <!-- session -->
        @if (Session::has('status'))
        @include("layouts.toast-session")
        @endif
        <!-- session -->
</body>

</html>
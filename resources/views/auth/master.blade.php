<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 CSS JAVASCRIPT" />
    <meta name="description" content="My Heroes Make Awesome Webiste" />
    <meta name="author" content="Hasan mEADY" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweetalert  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
    
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">

    @include('home.layouts.head')
</head>

<body>

        @yield("navbar")
        <!-- main-content -->
        <div class="container">

            @yield('page-header')

            @yield('content')
            @yield('background-dot')
            @yield('editor')
            @include("home.layouts.spinner")
            @include("home.layouts.toast")
            @include("home.layouts.settings")

        </div>

        <!-- footer -->
        @yield("footer")
        <!-- end footer -->

        <!--   === footer scripts -->
         @include('home.layouts.footer-scripts')
            <!--   === footer scripts -->
        <script src="{{ asset('js/auth/auth.js') }}" defer></script>

</body>

</html>

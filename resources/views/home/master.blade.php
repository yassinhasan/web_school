<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 CSS JAVASCRIPT" />
    <meta name="description" content="My Heroes Make Awesome Webiste" />
    <meta name="author" content="Hasan mEADY" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    @include('home.layouts.head')
</head>

<body>

    @include('home.layouts.navbar')
        <!-- main-content -->
        <div class="container">

            @yield('page-header')

            @yield('content')
            @yield('background-dot')
            @yield('editor')
        </div>

        <!--=======  footer -->
        
            @include('home.layouts.footer')


        <!--   === footer scripts -->

         @include('home.layouts.footer-scripts')
    

</body>

</html>

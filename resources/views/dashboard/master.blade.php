<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fontawsome -->
  <link href="{{ asset('css/assets/all.min.css?GYJH') }}" rel="stylesheet">
  <!-- bootstrap -->
  <link href="{{ asset('css/assets/bootstrap.min.css?GYJH') }}" rel="stylesheet">
  <!--- Style css -->
  <link href="{{ asset('css/layouts/main.css?GYJH') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts/spinner.css?GYJH') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts/toast-session.css?awass') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts/toast.css?GYJH') }}" rel="stylesheet">
  <link href="{{ asset('css/layouts/color.css') }}" rel="stylesheet">
  <!-- dashboard css -->
  <link href="{{ asset('css/dashboard/main.css?Asbbd') }}" rel="stylesheet">
  <title>@yield("title")</title>
  <style>
    @font-face {
      font-family: 'Rubik', 'sans-serif';
      src: url("{{ asset('fonts/Rubik-Regular.ttf') }} ") format("truetype");
    }
  </style>
  @yield('css')
  <!-- pusher -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <!-- pusher -->
</head>

<body>
        @include("layouts.spinner")
        @include("layouts.toast")
  <main>
    @if (auth('student')->check())
       @include('dashboard.layouts.student-nav')
    @elseif(auth('admin')->check())
       @include('dashboard.layouts.nav')
    @endif
 
    @yield('content')
  
  </main>
  <!-- session -->
  @if (Session::has('status'))
  @include("layouts.toast-session")
  @endif
  <!-- session -->
  <!-- jquery -->
  <script src="{{ asset('js/assets/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/layouts/spinner.js') }}"></script>
  <script src="{{ asset('js/layouts/toast.js') }}"></script>
  <script src="{{ asset('js/assets/bootstrap.bundle.min.js') }}"></script>
  @yield('js')


</body>

</html>
<!-- Title -->
<!--- Style css -->

<!-- fontawsome -->
<link href="{{ asset('css/assets/all.min.css?GYJH') }}" rel="stylesheet">
<!-- bootstrap -->
<link href="{{ asset('css/assets/bootstrap.min.css?GYJH') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/color.css?GYJH') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/main.css?GYJH') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/spinner.css?GYJH') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/toast.css?as') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/toast-session.css?awass') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/footer.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/main.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/settings.css?sad') }}" rel="stylesheet">
<!-- Font -->
<title>@yield("title")</title>
<style>
  @font-face{
  font-family: 'Rubik', 'sans-serif';
  src: url("{{ asset('fonts/Rubik-Regular.ttf') }} ") format("truetype");
}
</style>
@yield('css')






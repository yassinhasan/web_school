<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<link href="{{ URL::asset('assets/css/ltr.css?asd') }}" rel="stylesheet">
<!-- Font -->
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
<style>
  @font-face{
  font-family: 'Rubik', 'sans-serif';
  src: url("{{ asset('fonts/Rubik-Regular.ttf') }} ") format("truetype");
}
</style>
@yield('css')




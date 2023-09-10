<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<!--- Style css -->
<link href="{{ asset('css/layouts/color.css') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">

<!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css?asd') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css?asd') }}" rel="stylesheet">
@endif

@yield('css')


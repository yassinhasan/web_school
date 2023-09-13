@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?ad') }}" rel="stylesheet">
<link href="{{ asset('css/layouts/chatbot.css?ad') }}" rel="stylesheet">
<link href="{{ asset('css/home/home.css?ad') }}" rel="stylesheet">
@section('title')
My Heroes
@stop
@endsection
@section('page-header')
@endsection

@section('navbar')
@include("home.layouts.navbar2")
@endsection()
<!-- content -->
@section('content')
  <div class="rotate center-vertical">
    <div id="inner" class="inner">
      <p>Hello.</p>
      <p>I'm</p>
      <p>Hassan</p>
      <p>And</p>
      <p>I'm</p>
      <p>A Full</p>
      <p>Stack</p>
      <p>Developer</p>
      <p>This Site </p>
      <p>Made By <i class="fa fa-heart" aria-hidden="true"></i></p>
      <p>Hassan Meady</p>
    </div>
  </div>

  @include("home.layouts.chatbot")
@endsection
<!-- end content -->
@section('js')
<!-- Scripts -->
<script src="{{ asset('js/layouts/nav2.js') }}" defer></script>
<script src="{{ asset('js/layouts/chatbot.js') }}" defer></script>
<script src="{{ asset('js/home/home.js') }}" defer></script>
@endsection
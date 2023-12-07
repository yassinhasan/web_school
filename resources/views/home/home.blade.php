@extends('master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/chatbot.css?ad') }}" rel="stylesheet">
<link href="{{ asset('css/home/home.css?ad') }}" rel="stylesheet">
@section('title')
My Heroes
@stop
@endsection
@section('page-header')
@endsection

@section('navbar')
@include("layouts.navbar2")
@endsection()
<!-- content -->
@section('content')
  <div class="rotate center-vertical">
      <div id="inner" class="inner">
    {!! prepareIntroText($settings['intro_text']) !!}
    </div>
  </div>

  @include("layouts.chatbot")
@endsection
<!-- end content -->
@section('js')
<!-- Scripts -->
<script src="{{ asset('js/layouts/chatbot.js') }}" defer></script>
<script src="{{ asset('js/home/home.js') }}" defer></script>
@endsection
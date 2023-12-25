@extends('master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/html/images.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes Courses

@endsection()



@section('page-header')
<!-- breadcrumb -->
            <!-- breadcrumb -->
            <div aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">HTML Images</li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
              </ol>
            </div>
      <!-- breadcrumb -->
<!-- breadcrumb -->
@endsection
@section('content')

        <div class="video_container row">
            @foreach($posts as $post)
            <div class="card">
                <h2 class="card__title">{{$post->title}}</h2>
                {!!$post->content!!}
              </div>
              @endforeach
        </div>
@endsection

@section('background-dot')
      <div class="wrapper">
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
        <div><span class="dot"></span></div>
      </div>
@endsection('background-dot')


<!-- footer -->
@section("footer")
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/home/html/images.js') }}" defer></script>
@endsection

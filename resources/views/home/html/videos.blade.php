@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/html/videos.css') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
My Heroes Courses
@endsection()

<!-- navbar -->

@section("navbar")
    @include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

@section('page-header')
                  <!-- breadcrumb -->
                  <div aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
                      <li class="breadcrumb-item active" aria-current="page">HTML Videos</li>
                      <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                    </ol>
                  </div>
            <!-- breadcrumb -->
@endsection
@section('content')
<div class="video_container row">
            <div class="card">
                <h2 class="card__title">HTML-1</h2>
                <video class="card__img" src="{{url('videos/html/lesson1.mp4')}}"  muted autoplay controls></video>
                <p class="card__text">HTML is the standard markup language for Web pages.

With HTML you can create your own Website.

HTML is easy to learn - You will enjoy it!</p>
                <a class="card__btn btn" href="{{url('videos/html/lesson1.mp4')}}" download>Download</a>
              </div>
              <div class="card">
                <h2 class="card__title">HTML-2</h2>
                <video class="card__img " src="{{url('videos/html/lesson2.mp4')}}"  muted autoplay controls></video>
                <p class="card__text">The HTML <img> tag is used to embed an image in a web page.The <img> tag is empty, it contains attributes only, and does not have a closing tag.The <img> tag has two required attributes:'src' - Specifies the path to the image 'alt' - Specifies an alternate text for the image </p>
                <a class="card__btn btn" href="{{url('videos/html/lesson2.mp4')}}" download>Download</a>
              </div>
            <div class="card">
                <h2 class="card__title">HTML-3</h2>
                <video class="card__img" src="{{url('videos/html/lesson3.mp4')}}"  muted autoplay controls></video>
                <p class="card__text">The <a> tag defines a hyperlink, which is used to link from one page to another.

The most important attribute of the <a> element is the href attribute, which indicates the link's destination</p>
                <a class="card__btn btn" href="{{url('videos/html/lesson3.mp4')}}" download>Download</a>
              </div>
        </div>
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
@include('home.layouts.footer')
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}" ></script>
<script src="{{ asset('js/home/html/videos.js') }}" defer></script>
@endsection

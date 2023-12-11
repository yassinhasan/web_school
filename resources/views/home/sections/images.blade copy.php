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
            <div class="card">
                <!-- <h2 class="card__title">HTML is very easy</h2> -->
                <img class="card__img" src="{{url('images/html/fun1.jpg')}} " alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/fun1.jpg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">HTML</h2>
                <img class="card__img" src="{{url('images/html/html_struc1.jpg')}}" alt="image not found">
                <p class="card__text">HTML is the standard markup language for Web pages.</p>
                <a class="card__btn btn" href="{{url('images/html/html_struc1.jpg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">head and body</h2>
                <img class="card__img" src="{{url('images/html/head_body1.jpeg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/head_body1.jpeg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">head and body</h2>
                <img class="card__img" src="{{url('images/html/head_body2.jpeg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/head_body2.jpeg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">File Extension</h2>
                <img class="card__img" src="{{url('images/html/file_ext2.jpg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/file_ext2.jpg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">anchor element</h2>
                <img class="card__img" src="{{url('images/html/anchor.jpg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/anchor.jpg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">image element</h2>
                <img class="card__img" src="{{url('images/html/image_tag.jpg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/image_tag.jpg')}}" download>Download Images</a>
              </div>
            <div class="card">
                <h2 class="card__title">Inline vs  Block </h2>
                <img class="card__img" src="{{url('images/html/inline_block.jpg')}}" alt="image not found">
                <a class="card__btn btn" href="{{url('images/html/inline_block.jpg')}}" download>Download Images</a>
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
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/home/html/images.js') }}" defer></script>
@endsection

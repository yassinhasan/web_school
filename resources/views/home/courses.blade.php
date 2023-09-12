@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/courses.css') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
  My Heroes Courses
@endsection
@section('page-header')
@endsection

<!-- navbar -->

@section("navbar")
    @include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

@section('content')
<div class="accordion arrows">
  <div class="box header">
    <label for="acc-close" class="box-title">Front End Developer</label>
  </div>
  <!-- html -->
  <input type="radio" name="accordion" id="html" />
  <section class="box">
    <label class="box-title" for="html">HTML</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <ol class="alternating-colors">
        <li>
          <a href="{{route('html.videos')}}" class="strong">HTML Videos</a>
        </li>
        <li>
          <a href="{{route('html.images')}}" class="strong">HTML Images</a>
        </li>
        <li>
          <a href="{{route('html.lessons')}}" class="strong">HTML Lessons</a>
        </li>

      </ol>
    </div>
  </section>
  <!-- css -->
  <input type="radio" name="accordion" id="css" />
  <section class="box">
    <label class="box-title" for="css">CSS</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <!-- add links here -->
    </div>
  </section>
  <!-- js -->
  <input type="radio" name="accordion" id="js" />
  <section class="box">
    <label class="box-title" for="js">JAVA SCRIPT</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <!-- here links of js -->
    </div>
  </section>

  <input type="radio" name="accordion" id="acc-close" />
</div>
@endsection

<!-- footer -->
@section("footer")
<!-- @include('home.layouts.footer') -->
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}" ></script>
<script src="{{ asset('js/home/courses.js') }}" defer></script>
@endsection
<!-- Scripts -->

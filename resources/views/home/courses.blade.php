@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/courses.css') }}" rel="stylesheet">
@section('title')
My Heroes Courses
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<!-- breadcrumb -->
@endsection
@section('content')
<div class="accordion arrows">
        <div class="box header">
          <label for="acc-close" class="box-title">Front End Developer</label>
        </div>
        <!-- html -->
        <input type="radio" name="accordion" id="cb1" />
        <section class="box">
          <label class="box-title" for="cb1">HTML</label>
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
        <input type="radio" name="accordion" id="cb2" />
        <section class="box">
          <label class="box-title" for="cb2">CSS</label>
          <label class="box-close" for="acc-close"></label>
          <div class="box-content">
            <!-- add links here -->
          </div>
        </section>
        <!-- js -->
        <input type="radio" name="accordion" id="cb3" />
        <section class="box">
          <label class="box-title" for="cb3">JAVA SCRIPT</label>
          <label class="box-close" for="acc-close"></label>
          <div class="box-content">
            <!-- here links of js -->
          </div>
        </section>
    
        <input type="radio" name="accordion" id="acc-close" />
    </div>
@endsection

@section('js')

<!-- Scripts -->
<script src="{{ asset('js/home/courses.js') }}" defer></script>
@endsection




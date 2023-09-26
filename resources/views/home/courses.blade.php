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
  @foreach($categories as $category)
  <input type="radio" name="accordion" id="{{$category->name}}" />
  <section class="box">
    <label class="box-title" for="{{$category->name}}">{{$category->name}}</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <ol class="alternating-colors">
        @foreach($category->sections as $section)
        <li>
          <a href="{{route('html.videos')}}" class="strong">{{$category->name}} {{$section->name}}</a>
        </li>
        @endforeach
      </ol>
    </div>
  </section>
  @endforeach
  <!-- css -->
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

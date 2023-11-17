@extends('master')
@section('css')
<!-- Styles -->
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
    @include('layouts.navbar2')
@endsection()
<!-- navbar -->

@section('content')
<div class="accordion arrows">
  <div class="box header">
    <label for="acc-close" class="box-title" style="color: #fff;">Front End Developer</label>
  </div>
  
  <!-- html -->
  @if(isset($categories))
  @foreach($categories as $category)
  <input type="radio" name="accordion" id="{{$category->name}}" />
  <section class="box">
    <label class="box-title" for="{{$category->name}}">{{$category->name}}</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <ol class="alternating-colors">
        <!-- i want to show  all posts of lessons  courses/html/lessons -->
        @foreach($category->sections as $section)
        <li>
          <a href="{{url('/trainning', ['slug' => $section->slug] ) }}" class="strong">{{$category->name}} {{$section->name}}</a>
        </li>
        @endforeach
      </ol>
    </div>
  </section>
  @endforeach
  @endif
  
  @if(isset($connection_error))
    <div class="alert alert-danger">{{$connection_error}}</div>
  @endif
  <!-- css -->
  <input type="radio" name="accordion" id="acc-close" />
</div>
@endsection

<!-- footer -->
@section("footer")
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/home/courses.js') }}" defer></script>
@endsection
<!-- Scripts -->

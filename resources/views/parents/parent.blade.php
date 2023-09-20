@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/parents/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard/parents/modal.css') }}" rel="stylesheet">

@section('title')
    Parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Parents</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('parents.index') }}" class="default-color">Parents</a></li>
                <li class="breadcrumb-item active"> Show Parents</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="accordion arrows">
  <div class="box header">
    <label for="acc-close" class="box-title">{{$parents->name}}</label>
  </div>
  @foreach($parents->students as $student)
  <input type="radio" name="accordion" id="{{$student->first_name}}" />
  <section class="box">
    <label class="box-title" for="{{$student->first_name}}">{{$student->first_name." ".$student->last_name}}</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">
      <ol class="alternating-colors">
        <li>
          <a href="#" class="strong">Age : {{ $student->age }}
        </li>
        <li>
          <a href="#" class="strong">Gdender : {{ $student->gender }}</a>
        </li>
        <li>
          <a href="#" class="strong">Country : {{ $student->country }}</a>
        </li>

      </ol>
    </div>
  </section>
  @endforeach
  <!-- html -->
  <input type="radio" name="accordion" id="acc-close" />
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('js/dashboard/parents/script.js') }}"></script>
@endsection

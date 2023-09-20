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
      <!-- errors -->
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- errors -->
              <!-- add student  -->
              <button type="button" class="button x-small" data-toggle="modal" data-target="#editModal">
                        {{ __('Asign Student To Parent') }}
            </button>
            <br><br>
            <!-- end student  -->
<div class="accordion arrows">
@foreach($parents as $parent)
  <div class="box header">
    <label for="{{'parent-'.$loop->index}}" class="box-title">{{$parent->name}}</label>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $parent->id }}"
                                    title="{{ __('Delete Parent ') }}"><i
                                    class="fa fa-trash"></i></button>
  </div>
  @foreach($parent->students as $student)
  <input type="radio" name="accordion" id="{{$student->id.'-'.$loop->index}}" />
  <section class="box">
    <label class="box-title" for="{{$student->id.'-'.$loop->index}}">{{$student->first_name." ".$student->last_name}}</label>
    <label class="box-close" for="{{'parent-'.$loop->index}}"></label>
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
  <input type="radio" name="accordion" id="{{'parent-'.$loop->index}}" />
  @endforeach
  <!-- html -->
  <!-- delte modal -->
  @include("parents.layouts.deleteModal")

  <!-- delte modal -->
  @endforeach
</div>
</div>

    <!-- include add form modal -->
    @include("parents.layouts.addModal")
    <!-- include add form modal -->
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('js/dashboard/parents/script.js') }}"></script>
@endsection

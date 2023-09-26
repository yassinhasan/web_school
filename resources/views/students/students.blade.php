@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/students/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard/students/modal.css') }}" rel="stylesheet">

@section('title')
    students
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Students</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}" class="default-color">Students</a></li>
                <li class="breadcrumb-item active"> Show Students</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
<!-- table -->
@include('students.layouts.all-table')
<!-- end table -->
        </div>
        </div>
    </div>
</div>
<!-- row closed -->
@if (Session::has('status'))
    @section('message')
    {{ Session::get('status') }}
    @endsection()
    @include("home.layouts.toast-session")
    @endif
<!-- toast -->
@endsection
@section('js')
<script src="{{ asset('js/dashboard/students/script.js?laks') }}"></script>
@endsection

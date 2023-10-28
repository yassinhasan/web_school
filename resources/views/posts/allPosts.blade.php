@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/posts/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard/posts/modal.css') }}" rel="stylesheet">

@section('title')
    Posts
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Posts</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="default-color">Posts</a></li>
                <li class="breadcrumb-item active"> Show Posts</li>
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
@include('posts.layouts.all-table')
<!-- end table -->
        </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection
@section('js')
<script src="{{ asset('js/dashboard/posts/edit.js?laks') }}"></script>
@endsection

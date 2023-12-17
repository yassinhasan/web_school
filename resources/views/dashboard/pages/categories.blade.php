@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/categories.css') }}" rel="stylesheet">
@endsection
@section('title')
    categories

@endsection
@section('page-header')


@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
<!-- table -->
@include('dashboard.modals.categories.table')
<!-- end table -->
        </div>
        </div>
    </div>
</div>
<!-- row closed -->
        <!-- session -->
        @if (Session::has('status'))
        @include("layouts.toast-session")
        @endif
        <!-- session -->
@include("dashboard.modals.categories.repeatedModal")

@endsection
@section('js')
<script src="{{ asset('js/dashboard/categories.js?laks') }}"></script>
@endsection

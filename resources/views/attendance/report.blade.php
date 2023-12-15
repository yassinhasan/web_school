@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/attendance/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard/attendance/modal.css') }}" rel="stylesheet">

@section('title')
 Attendance Report
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Attendance Report</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('zoom.index') }}" class="default-color"> Student Attendance</a></li>
                <li class="breadcrumb-item active"> Attendance Report </li>
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
                            <!-- search form -->
                            @include('attendance.layouts.search')
                            <!-- table -->
                            @includeWhen(isset($students),'attendance.layouts.search-table')
                            <!-- end table -->
                        </div>
            
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('js/dashboard/attendance/attendance.js') }}"></script>
@endsection

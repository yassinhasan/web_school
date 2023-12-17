@extends('dashboard.master')
@section('css')

@endsection
@section('title')
 Attendance Report

@endsection
@section('page-header')

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
                        <div class="card-body">
                            <!-- search form -->
                            @include('dashboard.modals.attendance.search')
                            <!-- table -->
                            @includeWhen(isset($students),'dashboard.modals.attendance.search-table')
                            <!-- end table -->
                        </div>
            
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

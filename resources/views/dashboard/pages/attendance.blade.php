@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/attendance.css?Asd') }}" rel="stylesheet">
@endsection
@section('title')
Attendance

@endsection


@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="title-wraper">
                    <h4 class="title-head">
                        {{ __('Add  New Attendance')." ".date('Y-m-d') }}
                    </h4>
                </div>

                <!-- table -->

                @include('dashboard.modals.attendance.table')

                <!-- end table -->
            </div>

        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
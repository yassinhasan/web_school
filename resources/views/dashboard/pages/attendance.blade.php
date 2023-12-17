@extends('dashboard.master')
@section('css')
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

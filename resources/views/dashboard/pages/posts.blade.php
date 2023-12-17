@extends('dashboard.master')

@section('title')
    Posts
@endsection


@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
<!-- table -->
@include('dashboard.modals.posts.table')
<!-- end table -->
        </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection
@section('js')

@endsection

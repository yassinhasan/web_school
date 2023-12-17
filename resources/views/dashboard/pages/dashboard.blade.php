@extends('dashboard.master')
@section('css')
    @livewireStyles   
@endsection


@section('title')
    dashboard
@endsection

@section('content')
<!-- row -->
    @include('dashboard.layouts.content')

<!-- row closed -->
@endsection

@section('js')
<script src="{{ asset('js/dashboard/main.js') }}"></script>
@livewireScripts
    @stack('scripts')
@endsection

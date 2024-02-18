@extends('dashboard.master')
@section('css')
    @livewireStyles   
@endsection


@section('title')
    dashboard
@endsection

@section('content')
<!-- row -->

    @if (auth('student')->check())
        @include('dashboard.layouts.student-content')
    @elseif(auth('admin')->check())
        @include('dashboard.layouts.content')
    @endif


<!-- row closed -->
@endsection

@section('js')
<script src="{{ asset('js/dashboard/main.js') }}"></script>
@livewireScripts
    @stack('scripts')
@endsection

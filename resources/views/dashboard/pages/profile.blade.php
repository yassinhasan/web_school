@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/auth/profile.css?sad') }}" rel="stylesheet">

@endsection

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title')
Porfile
@endsection


@section('content')
<!-- row -->
<div class="container">
        <div class="bg-gray-100  profile-wraper">
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white  profile-head">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
        </div>
        {{ $slot }}
    </div>
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('js/auth/profile.js') }}"></script>
@endsection
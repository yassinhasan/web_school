@extends('master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
Login
@endsection


<!-- navbar -->

@section("navbar")
@include('layouts.navbar2')
@endsection()
<!-- navbar -->

<!-- content -->
@section('content')
<div class="form-section">
  <div class="form-wrapper">

    <h2 style="margin-bottom: 15px;">This is a secure area of the application. Enter OTP code to verify.</h2>
    <form method="POST" action="{{ route('otp-confirm') }}">
      @csrf
      <div class="input-container">
        <div class="form-group">
          <label for="otp">OTP Code</label>
          <input id="otp" type="text" name="code" required autofocus>
          @if($errors->has('code'))
          <div class="text-danger">{{ $errors->first('code') }}</div>
          @endif
        </div>
        <div class="mt-4" style="display: flex;">
          <button class="btn btn-secondary clicked-btn mr-2">Confirm</button>
    </form>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn btn-info clicked-btn">
        <a href="{{route('logout') }}" style="color: #fff;" onclick="event.preventDefault();
           this.closest('form').submit();">
          Login Page
        </a>
      </button>
    </form>
  </div>
</div>


@endsection

<!-- footer -->
@section("footer")
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
@endsection
<!-- Scripts -->
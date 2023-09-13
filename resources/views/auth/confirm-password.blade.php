@extends('auth.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
Login
@endsection


<!-- navbar -->

@section("navbar")
@include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

<!-- content -->
@section('content')

<div class="image-section">
  <div class="image-wrapper">
    <img src="https://imgur.com/wDmDIhi.png" alt="">
  </div>

  <div class="content-container">
    <h1 class="section-heading">Success begins with <span>Education.</span></h1>
  </div>
</div>

<div class="form-section">
  <div class="form-wrapper">

    <h2 style="margin-bottom: 15px;">This is a secure area of the application. Please confirm your password before continuing.</h2>
    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf
      <div class="input-container">
      <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" name="password"  required autofocus autocomplete="current-password">
          @if($errors->has('password'))
          <div class="text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-secondary clicked-btn">Confirm</button>
        </div>

    </form>
  </div>
</div>

@endsection

<!-- footer -->
@section("footer")
<!-- @include('home.layouts.footer') -->
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}"></script>
@endsection
<!-- Scripts -->





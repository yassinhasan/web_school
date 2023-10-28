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

<div class="image-section">
  <div class="image-wrapper">
  <img src="{{ url('images/bg.png') }}" alt="bg image">
  </div>

  <div class="content-container">
    <h1 class="section-heading">Success begins with <span>Education.</span></h1>
    <p class="section-paragraph">Education is the key that unlocks the limitless doors of knowledge, empowering us to shape our destinies and create a brighter future.</p>
  </div>
</div>

<div class="form-section">
  <div class="form-wrapper">

    <h2>Welcome Back! 👋🏻</h2>
    <p>Enter your credentials to access your account.</p>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-container">
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username">
          @if($errors->has('email'))
          <div class="text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required autocomplete="current-password">
          @if($errors->has('email'))
          <div class="text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>
      </div>

      <div class="remember-forgot">
        <div class="remember-me">
          <input type="checkbox" value="remember-me" id="remember-me" name="remember">
          <label for="remember-me" class="label-remember">Remember me</label>
        </div>

        <a href="{{ route('password.request') }}"  class="forget-btn">Forgot password?</a>
        <p>
          <a href="{{ route('register') }}" class="register-btn">Register</a>
        </p>
      </div>

      <button class="login-btn clicked-btn">Log In</button>

    </form>
  </div>
</div>
<!-- session -->

@endsection

<!-- Scripts -->
@section('js')
@endsection
<!-- Scripts -->
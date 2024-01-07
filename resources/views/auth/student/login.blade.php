@extends('master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
Login
@endsection



<!-- content -->
@section('content')
<div class="form-section">
  <div class="form-wrapper">

    <h2>Welcome Back! 👋🏻</h2>
    <p>Enter your credentials to access your account.</p>
    <form method="POST" action="{{ route('student.login') }}">
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
      <div class="form-group" style="text-align:center">Or</div>
      <div class="form-group">
      <a style="color: white;background-color: #ea4335;"  class="btn btn-lg btn-google btn-block text-uppercase" href="{{ route('google.login') }}"><i class="fab fa-google mr-2"></i> Sign in with Google</a>
      </div>
      <div class="remember-forgot">
        <div class="remember-me">
          <input type="checkbox" value="remember-me" id="remember-me" name="remember">
          <label for="remember-me" class="label-remember">Remember me</label>
        </div>

        <a href="{{ route('student.password.request') }}"  class="forget-btn">Forgot password?</a>
        <p>
          <a href="{{ route('student.register') }}" class="register-btn">Register</a>
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
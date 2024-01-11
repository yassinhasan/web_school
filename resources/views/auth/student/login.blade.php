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
      <div  style="text-align:center;font-weight:bold">Or</div>
      <div style="    text-align: center">
          <a  class="btn  btn-google  text-uppercase" href="{{ route('google.login') }}"><i class="fab fa-google mr-2"></i> Sign in with Google</a>
      </div>
      <div style="    text-align: center;margin: 8px 0 20px 0;">
          <a  class="btn  btn-facebook  text-uppercase" href="{{ route('facebook.login') }}"><i class="fab fa-facebook mr-2"></i> Sign in with Facebook</a>
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
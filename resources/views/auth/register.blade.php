@extends('auth.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
Register
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
  <img src="{{ url('images/bg.png') }}" alt="bg image">
  </div>

  <div class="content-container">
    <h1 class="section-heading">Success begins with <span>Education.</span></h1>
    <p class="section-paragraph">Education is the key that unlocks the limitless doors of knowledge, empowering us to shape our destinies and create a brighter future.</p>
  </div>
</div>

<div class="form-section">
  <div class="form-wrapper">

    <h2>Welcome ! 👋🏻</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="input-container">
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name">
          @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name') }}</div>
          @endif
        </div>
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
          @if($errors->has('password'))
          <div class="text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
          @if($errors->has('password_confirmation'))
          <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
          @endif
        </div>
      </div>

      <div class="remember-forgot">

        <a href="{{ route('login') }}">Already registered?</a>
        <p>
          <button class="btn btn-secondary clicked-btn">Register</button>
        </p>
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


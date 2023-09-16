@extends('auth.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
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
  <img src="{{ url('images/bg.png') }}" alt="bg image">
  </div>

  <div class="content-container">
    <h1 class="section-heading">Success begins with <span>Education.</span></h1>
  </div>
</div>

<div class="form-section">
  <div class="form-wrapper">

    <h2 style="margin-bottom: 15px;">Reset Your Password!👋🏻</h2>
    <form method="POST" action="{{ route('password.store') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      <div class="input-container">

      <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{old('email',$request->email)}}" required autofocus autocomplete="username">
          @if($errors->has('email'))
          <div class="text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="password" required autocomplete="new-password">
          @if($errors->has('email'))
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
        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-secondary clicked-btn">Reset Password</button>
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






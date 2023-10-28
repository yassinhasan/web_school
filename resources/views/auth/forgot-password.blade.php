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
  </div>
</div>

<div class="form-section">
  <div class="form-wrapper">

    <h2 style="margin-bottom: 15px;">Fotget Your Password!👋🏻</h2>
    <form method="POST" action="{{ route('password.email') }}" class="form">
      @csrf
      <div class="input-container">
      <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username">
          @if($errors->has('email'))
          <div class="text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-secondary clicked-btn email-btn">Email Password Reset Link</button>
        </div>

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
<script src="{{ asset('js/auth/auth.js') }}" ></script>

@endsection
<!-- Scripts -->




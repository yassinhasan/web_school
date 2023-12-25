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

    <h2 style="margin-bottom: 15px;">This is a secure area of the application. Please confirm your password before continuing.</h2>
    <form method="POST" action="{{ user.route('password.confirm') }}">
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
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
@endsection
<!-- Scripts -->





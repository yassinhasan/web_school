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

<div class="row">
<div class="form-section">
  <div class="form-wrapper">

    <h2 style="margin-bottom: 15px;">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</h2>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
        A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif    
    
    <form method="POST" action="{{ route('student.verification.send') }}" class="form">
      @csrf
      <div class="flex items-center justify-end mt-4">
            <button class="btn btn-secondary">Verification Email</button>
        </div>
    </form>
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
    <form method="POST" action="{{ route('student.logout') }}">
            @csrf
            <button type="submit " class="btn btn-secondary">
                {{ __('Log Out') }}
            </button>
    </form>
  </div>
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




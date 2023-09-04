@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/profile.css') }}" rel="stylesheet">
@section('title')
My Heroes Profile
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<!-- breadcrumb -->
@endsection
@section('content')
<ul>
  <li>
    <div class="details">
      <h2>Yassin</h2>
      <p><a href="https://yassin14.w3spaces.com">My Website</a></p>
      <div class="product">
        <img src="{{url('images/profile/hasan.jpg')}}">
      </div>
    </div>
  </li>
  <li>
    <div class="details">
      <h2>Karma</h2>
      <p><a href="https://karma781.w3spaces.com">My Website</a></p>
      <div class="product">
        <img src="{{url('images/profile/karma.jpg')}}">
      </div>
    </div>
  </li>
  <li>
    <div class="details">
      <h2>Rahaf</h2>
      <p><a href="https://rahaf781.w3spaces.com">My Website</a></p>
      <div class="product">
        <img src="{{url('images/profile/rahaf.jpg')}}">
      </div>
    </div>
  </li>
  <li>
    <div class="details">
      <h2>Yamen</h2>
      <p><a href="https://yamen10.w3spaces.com">My Website</a></p>
      <div class="product">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/threadless12.jpg">
      </div>
    </div>
  </li>
</ul>
@endsection

@section('js')

<!-- Scripts -->
<script src="{{ asset('js/home/profile.js') }}" defer></script>
@endsection
@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/profile.css') }}" rel="stylesheet">
<!-- style -->
@section('title')
My Heroes Profile
@stop
@endsection

@section('page-header')
@endsection

<!-- navbar -->

@section("navbar")
    @include('home.layouts.navbar2')
@endsection()
<!-- navbar -->
@section('content')
<ul class="card-wraper">
  @foreach($students as $student)
  <li>
    <div class="details">
      <h2>{{ ucfirst($student->first_name) }}
      </h2>
      <?php $website = json_decode($student->website, true) ?>
      <p class="age">{{$student->age}} Years</p>
      <p class="country">{{$student->country}} </p>
      @if($website)
      <p class="website"><a href="{{$website[0]}}">{{$website[0]}}</a></p>
      @else
      <p class="website"><a href="#">No Web Site Now</a></p>
      @endif
      <p class="points"> <i class="fa fa-heart heart_rating"></i>
        <span class="love-points">{{$student->points}}</span>
      </p>
      <div class="product">
        <img src="{{url('images/profile/students/'.$student->image)}}">
      </div>
    </div>
  </li>
  @endforeach
  {{ $students->links('pagination::bootstrap-5') }}

</ul>
@endsection


<!-- footer -->
@section("footer")
<!-- @include('home.layouts.footer') -->
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}" ></script>
<script src="{{ asset('js/home/profile.js') }}" defer></script>
@endsection
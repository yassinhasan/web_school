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
  @foreach($students as $student)
  <li>
    <div class="details">
      <h2>{{ ucfirst($student->first_name) }}
      </h2>
      <?php $website = json_decode($student->website, true) ?>
      <p class="age">{{$student->age}} Years</p>
      <p class="country">{{$student->country}} </p>
      <p class="website"><a href="{{$website[0]}}">{{$website[0]}}</a></p>
      <p class="points"> <i class="fa fa-heart heart_rating"></i>
        <span class="love-points">{{$student->points}}</span>
      </p>
      <div class="product">
        <img src="{{url('images/profile/'.$student->image)}}">
      </div>
    </div>
  </li>
  @endforeach

</ul>
@endsection

@section('js')

<!-- Scripts -->
<script src="{{ asset('js/home/profile.js') }}" defer></script>
@endsection
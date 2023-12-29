@extends('master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/cards.css') }}" rel="stylesheet">
<!-- style -->
@section('title')
My Heroes Profile
@stop
@endsection
@section('page-header')
@endsection


@section('content')
<ul class="card-wraper">
  @foreach($students as $student)
  <li>
    <div class="details">
      <h2>{{ ucfirst(substr($student->name,0,14)) }}
      </h2>
     
      <p class="age">{{$student->age}} Years</p>
      <p class="country">{{$student->country}} </p>
      <p class="points"> <i class="fa fa-heart heart_rating"></i>
        <span class="love-points">{{$student->points}}</span>
      </p>
      <div class="product">
        <img src="{{url('images/profile/students/'.$student->image)}}">
      </div>
      <!-- website -->
      <?php $website = json_decode($student->website, true) ?>
      @if($website)
      <p class="website"><a href="{{$website[0]}}">My Website</a></p>
      @else
      <p class="website"><a href="#">No Web Site Yet</a></p>
      @endif
      <!-- website -->
    </div>
  </li>
  @endforeach
  
</ul>

{{ $students->links('pagination::bootstrap-5') }}
@endsection


<!-- footer -->
@section("footer")
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/home/profile.js') }}" defer></script>
@endsection
@extends('master')

@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/rating.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes
@endsection


@section('content')
<!-- row -->

<main>
  <div class="header">
    <h1 class="header-h1">My Heroes Progress</h1>
    <button class="share">
      <a href="whatsapp://send?text=to Keep Track of Your Child's Progress https://honor.w3spaces.com" title="Share on whatsapp"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
    </button>
  </div>
  <!-- start wraper -->
  <div class="wraper row">
    @foreach($students as $student)
    <div class="inside_Wraper row">
      <!-- name anu number -->
      <div class="col-8 row name_number">
        <div class="number">
          {{ $loop->index + 1 }}
        </div>
        <div class="name">
          {{  ucwords(substr($student->name,0,10))}}
        </div>
        <div class="image">
          <img src="{{ url('images/profile/students/'.$student->image)}}" class="img-fluid profile">

        </div>

      </div>
      <!-- rating  -->
      <div class="col-4 rating_points">

        <div class="points">
          <i class="fa fa-heart heart_rating"></i>
          <span class="main-love-points-{{$student->id}}">{{$student->points}}</span>
        </div>

      </div>
    </div>
    @endforeach
    <br>
  </div>
  {{ $students->links('pagination::bootstrap-5') }}
  <div class="buttons row">
    <a type="button" class="btn btn-outline-dark preview" href="{{route('websites')}}">Preview
      Websites</a>
    <button type="button" class="btn btn-warning" onclick="window.location.reload()">Refresh
    </button>
  </div>
</main>

@endsection

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/home/rating.js') }}" defer></script>
@endsection
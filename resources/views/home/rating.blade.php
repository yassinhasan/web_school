@extends('home.master')

@section('css')
<!-- Styles -->

<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/rating.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes
@endsection

<!-- navbar -->

@section("navbar")
    @include('home.layouts.navbar2')
@endsection()
<!-- navbar -->
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
                           {{ ucwords($student->first_name)}}
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
  </div>
  <div class="buttons row">
    <button type="button" class="btn btn-outline-dark preview" data-toggle="modal" data-target="#voting_modal">Preview
      Websites</button>
    <button type="button" class="btn btn-warning" onclick="window.location.reload()">Refresh
    </button>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="voting_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content 	">
        <div class="modal-header">
          <h5 class="modal-title">Click on image to show website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row links_wraper">
            <div class="row col-12">
              @foreach($students as $student)
              <div class=" col-6 link_body" type="button" data-toggle="modal" data-target="#websiteModal{{$loop->index}}">
                <!-- <span class="hover_span image">Yassin</span> -->
                <figure class="image">
                  <img src="{{ asset( 'images/profile/students/'.$student->image )}}" class="img-fluid clicked_profile">
                  <figcaption>{{ucfirst($student->first_name)}}</figcaption>
                </figure>  
              </div>
              @endforeach
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end modal -->
</main>

<!-- website modal -->
@foreach($students as $student)
<div  class="modal fade" id="websiteModal{{ $loop->index }}" tabindex="-1" aria-labelledby="websiteModal{{ $loop->index }}" aria-hidden="true">
  <div class="modal-dialog modal-lg	" role="document">
    <div class="modal-content">
      <div class="modal-header website_header">
        <div class="col-7">
          <h5 class="modal-title" style="margin-left: 10px;">{{ ucfirst($student->first_name) }} Website </h5>
        </div>
        <div class="col-3">
        <?php $likedby =json_decode($student->likedby, true) ?>

          <h5 class="modal-title"><i class="fa fa-heart website_like {{ in_array(Auth::id() ,$likedby)  == true ? 'like' : '' }}" data-id="{{$student->id}}"></i> <span class="love-numbers-{{$student->id}}">{{ $student->points }} </span></h5>
         @csrf
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="xbox card" data-target="1">
        <?php $website =json_decode($student->website, true) ?>
        @if($website)
          <iframe src="{{ $website[0] }}" width="100%" height="600px" allowfullscreen seamless class="website-iframe">
          </iframe>
          @else
          <h3 class="no-website" style="text-align: center;">There is no website Now </h3>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- website modal -->

@endsection

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}" ></script>
<script src="{{ asset('js/home/rating.js') }}" defer></script>
@endsection
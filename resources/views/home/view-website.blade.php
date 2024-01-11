@extends('master')

@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/websites.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes
@endsection





@section('content')

  <!-- Modal -->
      <div class="modal-content modal-wraper">
        <div class="modal-header">
          <h5 class="modal-title">Click on image to show website</h5>
        </div>
        <div class="modal-body">
          <div class="row links_wraper">
              @foreach($students as $student)
              <div class=" col-md-6 student-box" type="button" data-toggle="modal" data-target="#websiteModal{{$loop->index}}">
                <!-- <span class="hover_span image">Yassin</span> -->
                <figure class="image">
                  <img src="  {{ getStudentImage($student->image) }} " class="img-fluid clicked_profile">
                  <figcaption>{{ucfirst($student->name)}}</figcaption>
                </figure>  
              </div>
              @endforeach
              {{ $students->links('pagination::bootstrap-5') }}
            </div>


          </div>
      </div>


  <!-- end modal -->

  <!-- website modal -->
@foreach($students as $student)
<div  class="modal fade " id="websiteModal{{ $loop->index }}" tabindex="-1" aria-labelledby="websiteModal{{ $loop->index }}" aria-hidden="true">
  <div class="modal-dialog modal-lg	" role="document">
    <div class="modal-content rating-modal">
      <div class="modal-header website_header">
        <div class="col-7">
          <h5 class="modal-title" style="margin-left: 10px;">{{ ucfirst($student->name) }} Website </h5>
        </div>
        <div class="col-3">
        <?php $likedby =json_decode($student->likedby, true) ?>

          <h5 class="modal-title"><i style="cursor:pointer" class="fa fa-heart website_like {{ in_array(Auth::id() ,$likedby)  == true ? 'like' : '' }}" data-id="{{$student->id}}"></i> <span class="love-numbers-{{$student->id}}">{{ $student->points }} </span></h5>
         @csrf
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="website-preview card" data-target="1">
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
<script src="{{ asset('js/home/websites.js') }}" defer></script>
@endsection





@extends('home.master')
@section('css')
    <!-- Styles -->
    <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
@section('title')
    My Heroes
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<main>
      <div id="header">
        <h1>My Heroes Progress</h1>
        <button class="share">
          <a href="whatsapp://send?text=to Keep Track of Your Child's Progress https://honor.w3spaces.com"
            title="Share on whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </button>
      </div>
      <!-- start wraper -->
      <div class="wraper row">
      </div>
      <div class="buttons row">
        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#voting_modal">Preview
          Websites</button>
        <a type="button" class="btn btn-info Home" href="{{route('profile')}}">Profile Cards</a>
        <a type="button" class="btn btn-danger Home" href="{{ route('courses') }}">Courses</a>
        <!-- try button -->
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#editor">Try Edit</button>
        <!-- try button -->
      </div>
      <!-- modal -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="voting_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Click on image to show website</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row links_wraper">
                <div class="row col-12">
                  <div class=" col-6 link_body">
                    <!-- <span class="hover_span image">Yassin</span> -->
                    <figure class="image">
                      <img src="{{url('images/profile/rahaf.jpg')}}"
                        class="img-fluid clicked_profile">
                      <figcaption>Rahaf</figcaption>
                    </figure>

                  </div>
                  <div class=" col-6 link_body">
                    <!-- <span class="hover_span image">Yassin</span> -->
                    <figure class="image">
                      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/881020/threadless14.jpg"
                        class="img-fluid clicked_profile">
                      <figcaption>Yamen</figcaption>

                    </figure>

                  </div>
                  <div class=" col-6 link_body">
                    <!-- <span class="hover_span image">Yassin</span> -->
                    <figure class="image">
                      <img src="{{url('images/profile/karma.jpg')}}"
                        class="img-fluid clicked_profile">
                      <figcaption>Karma</figcaption>

                    </figure>

                  </div>
                  <div class=" col-6 link_body">
                    <!-- <span class="hover_span image">Yassin</span> -->
                    <figure class="image">
                      <img src="{{url('images/profile/hasan.jpg')}}" class="img-fluid clicked_profile">
                      <figcaption>Yassin</figcaption>

                    </figure>

                  </div>
                </div>
                <div class="xbox card" data-target="1">
                  <iframe src="https://rahaf781.w3spaces.com" width="90%" height="300px" allowfullscreen seamless>
                  </iframe>
                </div>
                <div class="xbox card" data-target="2">
                  <iframe src="https://yamen10.w3spaces.com" width="90%" height="300px" allowfullscreen seamless>
                  </iframe>
                </div>
                <div class="xbox card" data-target="3">
                  <iframe src="https://karma781.w3spaces.com" width="90%" height="300px"></iframe>
                </div>
                <div class="xbox card" data-target="4">
                  <iframe src="https://yassin14.w3spaces.com" width="90%" height="300px">
                  </iframe>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- end modal -->
    </main>
<!-- row closed -->
@endsection
@section('editor')
    <!-- editor modal -->
    <div class="modal fade" id="editor" tabindex="-1" role="dialog" aria-labelledby="editorModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row" style="width: 100%; justify-content: space-between;padding: 0 1rem;margin-bottom: 10px;">
              <h5 class="modal-title" style="font-weight: 800;" id="editorModalLabel">HTML</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-group">
              <textarea class="form-control html_code" style="font-family: monospace;" id="exampleFormControlTextarea1"
                rows="10" placeholder="enter your code here"></textarea>
            </div>
            <button type="button" class="btn btn-danger run" style="margin-bottom: 15px;">Run</button>
            
            <div class="embed-responsive embed-responsive-16by9 html_preview_div">
              <iframe class="embed-responsive-item html_preview"></iframe>
            </div>
          </div>  
        </div>
      </div>
    </div>
    <!-- editor modal -->
@endsection('editor')
@section('js')

    <!-- Scripts -->
    <script src="{{ asset('js/home/scripts.js') }}" defer></script>
@endsection

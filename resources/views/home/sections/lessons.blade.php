@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/html/lessons.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes Courses
@endsection()

<!-- navbar -->

@section("navbar")
@include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

@section('page-header')
<!-- breadcrumb -->
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
        <li class="breadcrumb-item active" aria-current="page">HTML Lessons</li>
        <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
    </ol>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- articles -->
<div class="accordion" id="main_accordio">
    <!-- why html -->
    @foreach($posts as $post)
    <div class="card bg bg-info">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   {{ $post->title }}
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#main_accordio">
            <div class="card-body">
                {!!$post->content!!}
            </div>

        </div>
    </div>
    @endforeach
    {{ $posts->links('pagination::bootstrap-5') }}

    <!-- why html end -->
    <!-- head and body -->
    <!-- end tag elemnts -->
</div>
<!-- articles -->
@endsection

@section('editor')
<!-- editor modal -->
<div class="modal fade" id="editor" tabindex="-1" role="dialog" aria-labelledby="editorModalLabel" aria-hidden="true">
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
                    <textarea class="form-control html_code" style="font-family: monospace;" id="exampleFormControlTextarea1" rows="10" placeholder="enter your code here"></textarea>
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


<!-- footer -->
@section("footer")
<!-- @include('home.layouts.footer') -->
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}"></script>
<script src="{{ asset('js/home/html/lessons.js') }}" defer></script>
@endsection
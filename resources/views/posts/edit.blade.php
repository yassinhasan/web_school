@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/posts/style.css') }}" rel="stylesheet">
<script src="{{ asset('ckeditor/ckeditor.js?laks') }}"></script>

@section('title')
categories
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Posts</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="default-color">Posts</a></li>
                <li class="breadcrumb-item active">Edit Posts</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- table -->
                <form class="post-form" method="post" action="{{route('posts.update')}}" enctype="multipart/form-data">
                    {{method_field('patch')}}   
                    @csrf
                    <input type="text" name="id" value="{{$post->id}}" hidden>
                    <div class="form-group">
                        <label for="select_parent"> select Category</label>
                        <select class="form-control seect-category" name="category_id">
                        <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ $post->sections->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group select-section">
                    <select class="form-control" name="section_id">
                        <option value="">Select Section</option>
                            @foreach($sections as $key=>$value)
                            <option value="{{$key}}" {{ $post->sections->id == $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label id="title" for="title">Post Title</label>
                        <input type="text" name="title" value="{{$post->title}}" id="title" placeholder="Enter Post Title" class="form-control" required>
                    </div>
                    <div class="ckeditor" style="margin: 15px 0;">
                        <textarea id="post" name="post">{{$post->content}}</textarea>
                    </div>
                    <!-- add student  -->
                    <button type="submit" class="button btn btn-secondary">
                        {{ __('Update  Post') }}
                    </button>
                </form>
                <!-- end table -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@if (Session::has('status'))
@section('message')
{{ Session::get('status') }}
@endsection()
@include("home.layouts.toast-session")
@endif
<!-- toast -->

@endsection
@section('js')

<script src="{{ asset('js/dashboard/posts/script.js?laks') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $("#ck_texteditor").ckeditor();
        CKEDITOR.replace('post', {

            filebrowserUploadUrl: "{{route('posts.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });
</script>
@endsection
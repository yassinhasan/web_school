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
                <li class="breadcrumb-item"><a href="{{ route('posts.create') }}" class="default-color">Posts</a></li>
                <li class="breadcrumb-item active">Add Posts</li>
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
                <form class="post-form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="select_parent"> select Category</label>
                        <select class="form-control seect-category" name="category_id">
                        <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group select-section">

                    </div>

                    <div class="form-group">
                        <label id="title" for="title">Post Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Enter Post Title" class="form-control" required>
                    </div>
                    <div class="ckeditor" style="margin: 15px 0;">
                        <textarea id="content" name="content"></textarea>
                    </div>
                    <!-- add student  -->
                    <button type="submit" class="button btn btn-secondary">
                        {{ __('Save  Post') }}
                    </button>
                </form>
                <!-- end table -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->


@endsection
@section('js')

<script src="{{ asset('js/dashboard/posts/script.js?laks') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $("#ck_texteditor").ckeditor();
        CKEDITOR.replace('content', {

            filebrowserUploadUrl: "{{route('posts.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });
</script>
@endsection
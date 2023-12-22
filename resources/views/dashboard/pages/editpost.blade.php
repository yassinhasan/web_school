@extends('dashboard.master')
<script src="{{ asset('ckeditor/ckeditor.js?laks') }}"></script>
@section('css')
@endsection

@section('title')
Edit Post
@endsection


@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            <div class="title-wraper">
                    <h4 class="title-head">
                        {{ __('Edit Post') }}
                    </h4>
                </div>
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
                        <textarea id="content" name="content">{{$post->content}}</textarea>
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
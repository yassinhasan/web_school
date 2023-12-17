@extends('dashboard.master')
<script src="{{ asset('ckeditor/ckeditor.js?laks') }}"></script>
@section('css')

@endsection

@section('title')
Posts
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


<script type="text/javascript">
    $(document).ready(function() {
        // $("#ck_texteditor").ckeditor();
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('posts.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
            });

    });
</script>
<script src="{{ asset('js/dashboard/posts.js?lks') }}"></script>
@endsection
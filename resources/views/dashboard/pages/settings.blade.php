@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/settings.css') }}" rel="stylesheet">
@endsection

@section('title')
Settings

@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- content -->
                <div class="title-wraper">
                <h4 class="title-head">
                        {{ __('Settings') }}
                    </h4>
                </div>
                <form action="{{route('settings.update')}}" enctype="multipart/form-data" method="POST">
                {{method_field('patch')}}
                    @csrf  
                    <div class="form-group row">
                        <label for="website_email" class="col-sm-2 col-form-label">Zoom Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="website_email" class="form-control  form-control-lg" id="website_email" value="{{$settings['website_email']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-2 col-form-label">Phone  Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_number" class="form-control  form-control-lg" id="phone_number" value="{{$settings['phone_number']}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zoom_email" class="col-sm-2 col-form-label">Website Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="zoom_email" class="form-control  form-control-lg" id="zoom_email" value="{{$settings['zoom_email']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="HomeIntroText" class="col-sm-2 col-form-label">Home Intro Text</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="HomeIntroText" rows="6" name="intro_text" placeholder="seperate each line with coma">{{$settings['intro_text']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2 col-form-label" for="addinputImage">ChatBot Image:</label>
                        <input type="file" name="chat_image" id="addinputImage" class="input_image form-control-lg @error('chat_image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                        @error('chat_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <img class="image_view" src="{{url('images/settings/'.$settings['chat_image'])}} ">
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-2 col-form-label" for="addinputImage2">Logo Image:</label>
                        <input type="file" name="logo_image" id="addinputImage2" class="input_image form-control-lg @error('logo_image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                        @error('logo_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <img class="image_view"  src="{{url('images/settings/'.$settings['logo_image'])}} " >
                    </div>
                    <div>
                                <button type="submit"  class="btn btn-primary ">Update Settings</button>

                        </div>
                </form>
                <!-- end content -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
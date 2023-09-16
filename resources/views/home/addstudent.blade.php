@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/addstudent.css?dsf') }}" rel="stylesheet">
@endsection()
<!-- style -->
@section('title')
Add Your Student
@endsection
@section('page-header')
@endsection

<!-- navbar -->

@section("navbar")
@include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

<!-- content -->
@section('content')
<!-- add_modal_student -->
<div class="image-section">
  <div class="image-wrapper">
  <img src="{{ url('images/bg.png') }}" alt="bg image">
  </div>

  <div class="content-container">
    <h1 class="section-heading">Success begins with <span>Education.</span></h1>
    <p class="section-paragraph">Education is the key that unlocks the limitless doors of knowledge, empowering us to shape our destinies and create a brighter future.</p>
  </div>
</div>
<div class="form-section">
  <div class="form-wrapper">

    <h2>Add Your Student</h2>
    <p>Note Your email and phone is important to keep contact with you</p>
    <form action="{{ route('addstudent.add') }}" class="student-form" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label id="add_first_name" for="add_first_name">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" id="add_first_name" placeholder="Enter your First Name" class="form-control" required>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label id="add_last_name" for="add_last_name">Last Name</label>
            <input type="text" name="last_name" id="add_last_name" value="{{ old('last_name') }}" placeholder="Enter your Last Name" class="form-control" required>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="add_age">Age</label>
            <input type="number" name="age" id="add_age" value="{{ old('age') }}" min="5" max="99" class="form-control" placeholder="Age">
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label>Country</label>
            <select id="add_country" name="country" class="form-control" required>
              <option disabled selected value>Select</option>
              <option value="ksa">Saudi Arabia</option>
              <option value="egypt">Egypt</option>

            </select>
          </div>
        </div>
      <!-- website -->
      <div class="col-12">
      <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
      </div>
      </div>
      <div class="col-12">
      <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" pattern="[0-9]*" inputmode="numeric" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="Your Phone">
       </div>
      </div>
      </div>
      <!-- website -->
      <!-- rating and progress -->

      <!-- rating and progress -->

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Gender</label>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="add_male" value="male" name="gender" class="custom-control-input" value="{{ old('gender') == 'male' ?'checked' : '' }}">
              <label class="custom-control-label" for="add_male">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="add_female" value="female" name="gender" class="custom-control-input" value="{{ old('gender') == 'female' ?'checked' : '' }}">
              <label class="custom-control-label" for="add_female">Female</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Leave Message About Student</label>
            <textarea id="add_about" class="form-control" name="about" placeholder="Enter your comment here...">{{old('about')}}</textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="form-label" for="addinputImage">Image:</label>
            <input type="file" name="image" id="addinputImage" class="student_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <img class="student_image  hide" src="" style="max-width:100%">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <button type="submit" id="addStudent" class="btn btn-primary btn-block add-student-btn">Add</button>
        </div>
      </div>

    </form>
  </div>
</div>



@endsection
<!-- content -->

<!-- footer -->
@section("footer")
<!-- @include('home.layouts.footer') -->
@endsection()
<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}"></script>
<script src="{{ asset('js/home/addstudent.js') }}" defer></script>
@endsection
<!-- Scripts -->
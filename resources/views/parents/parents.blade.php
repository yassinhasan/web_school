@extends('dashboard.master')
@section('css')
<link href="{{ asset('css/dashboard/parents/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard/parents/modal.css') }}" rel="stylesheet">

@section('title')
Parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
  <div class="row">
    <div class="col-sm-6">
      <h4 class="mb-0"> Parents</h4>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
        <li class="breadcrumb-item"><a href="{{ route('parents.index') }}" class="default-color">Parents</a></li>
        <li class="breadcrumb-item active"> Show Parents</li>
      </ol>
    </div>
  </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
  <!-- errors -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- errors -->
  <!-- add student  -->
  <button type="button" style="margin: 10px ;" class="button x-small" data-toggle="modal" data-target="#editModal">
    {{ __('Asign Student To Parent') }}
  </button>
  
  <button type="button" style="margin: 10px ;" class="button btn-info x-small" data-toggle="modal" data-target="#searchModal">
    {{ __('Search By Parent Or Student') }}
  </button>

  <a type="button" style="margin: 10px ;" class="button btn-secondary x-small"  href="{{route('parents.index')}}">
    {{ __('Show All Parents') }}
</a>
  <!-- end student  -->
  <?php  $parents = (isset($selected_parents) && count($selected_parents) > 0) ? $selected_parents : $parents;  ?>

  @foreach($parents as $parent)
  <div class="accordion" style="margin: 10px 0;" id="{{'parent-'.$parent->id}}">
    <div class="card">
      <div class="card-header row" style="justify-content: space-between;" id="headingOne" >
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{'target-parent-'.$parent->id}}" aria-expanded="true" aria-controls="collapseOne">
          {{$parent->name}}
            </button>   
          </h2>
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $parent->id }}" title="{{ __('Delete Parent ') }}"><i class="fa fa-trash"></i></button>
      </div>
      <div id="{{'target-parent-'.$parent->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#{{'parent-'.$parent->id}}">
        <div class="card-body">
          <!-- table -->
          <div class="table-responsive">
            <table  class="table table-striped table-hover table-bordered p-0">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Age</th>
                      <th>Website</th>
                      <th>Country</th>
                      <th>Process</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($parent->students as $student)

                    <tr>
                      <td>{{ ucfirst($student->first_name." ".$student->last_name )}}</td>
                      <td><img src="{{ asset('images/profile/students/').'/'.$student->image}}" class="iamge_table"></td>
                      <td>{{ $student->age}}</td>
                      <?php $website =json_decode($student->website, true) ?>
                      <td>
                        @if($website)
                        <a class="website_link" href="{{ $website[0] }}">{{ $website[0]}}</a>
                        <br>
                        <a class="website_link" href="{{ $website[1] }}">{{ $website[1]}}</a>
                        @endif
                      </td>
                      <td>{{ $student->country}}</td>
                      <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $student->id }}"
                                    title="{{ __('Student.Edit') }}"><i
                                    class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $student->id }}"
                                    title="{{ __('Student.Delete') }}"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                  </tr>
                                <!-- edit_modal_student -->
                                @include("students.layouts.editModal")

                                <!-- delete_modal_Student -->
                                @include("students.layouts.deleteModal")
                  @endforeach

              </tbody>
              
           </table>
          </div>
          <!--  end table-->
        </div>
      </div>
    </div>
  </div>
<!-- delte modal -->
@include("parents.layouts.deleteModal")
<!-- delte modal -->
@endforeach

@if(!isset($selected_parents) || count($selected_parents) == 0 )
{{ $parents->links('pagination::bootstrap-5') }}
@endif
</div>

<!-- include add form modal -->
@include("parents.layouts.addModal")
<!-- include add form modal -->
<!-- include search form modal -->
@include("parents.layouts.searchModal")
<!-- include search form modal -->
<!-- row closed -->
@endsection
@section('js')
<script src="{{ asset('js/dashboard/parents/script.js') }}"></script>
@endsection
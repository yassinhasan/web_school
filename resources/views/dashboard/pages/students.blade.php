@extends('dashboard.master')
<link href="{{ asset('css/dashboard/student.css?Asd') }}" rel="stylesheet">
@section('title')
students
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- table -->
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <!-- add student  -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addStudentModal">
                                    {{ __('Add Student') }}
                                </button>

                                <br><br>
                                <!-- end student  -->
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-hover table-bordered p-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Website</th>
                                                <th>Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)

                                            <tr>
                                                <td>{{ ucfirst($student->name)}}</td>
                                                <td><img src="{{ asset('images/profile/students/').'/'.$student->image}}" class="iamge_table"></td>
                                                <td>{{ $student->age}}</td>
                                                <?php $website = json_decode($student->website, true) ?>
                                                <td>
                                                    @if($website)
                                                    <a class="website_link" href="{{ $website[0] }}" target="_blank">{{ $website[0]}} </a>
                                                    <br>
                                                    <a class="website_link" href="{{ $website[1] }}" target="_blank">{{ $website[1]}}</a>
                                                    @endif
                                                </td>
                                                <td>{{ $student->email}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $student->id }}" title="{{ __('Student.Edit') }}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $student->id }}" title="{{ __('Student.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- edit_modal_student -->
                                            @include("dashboard.modals.students.editModal")

                                            <!-- delete_modal_Student -->
                                            @include("dashboard.modals.students.deleteModal")
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Website</th>
                                                <th>Process</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- include add form modal -->
                    @include("dashboard.modals.students.addModal")

                    <!-- include add form modal -->
                </div>


                <!-- end table -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection
@section('js')
<script src="{{ asset('js/dashboard/students.js?laks') }}"></script>
@endsection
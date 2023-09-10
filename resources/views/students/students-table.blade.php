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
            <button type="button" class="button x-small" data-toggle="modal" data-target="#addStudentModal">
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
                      <th>Age</th>
                      <th>Website</th>
                      <th>Country</th>
                      <th>Process</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($students as $student)

                    <tr>
                      <td>{{ ucfirst($student->first_name." ".$student->last_name )}}</td>
                      <td><img src="{{ asset('images/profile').'/'.$student->image}}" class="iamge_table"></td>
                      <td>{{ $student->age}}</td>
                      <?php $website =json_decode($student->website, true) ?>
                      <td>
                        <a class="website_link" href="{{ $website[0] }}">{{ $website[0]}}</a>
                        <br>
                        <a class="website_link" href="{{ $website[1] }}">{{ $website[1]}}</a>
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
                                @include("students.editModal")

                                <!-- delete_modal_Student -->
                                @include("students.deleteModal")
                  @endforeach

              </tbody>
              <tfoot>
                  <tr>
                  <th>Name</th>
                      <th>Image</th>
                      <th>Age</th>
                      <th>Website</th>
                      <th>Country</th>
                      <th>Process</th>
                  </tr>
              </tfoot>
              
           </table>
          </div>
          </div>
        </div>   
      </div>
    <!-- include add form modal -->
    @include("students.addModal")
    <!-- include add form modal -->
  </div> 
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
          <br><br>
              <!-- end student  -->
              <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-hover table-bordered p-0">
                  <thead>
                      <tr>
                          <th>Student Name</th>
                          <th>Image</th>
                          <th>Country</th>
                          <th>Age</th>
                          <th>Attendance</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $student)
                    <tr>
                        <input hidden type="text" value="{{ $student->id }}" name="id[]" >
                        <td>{{ $student->first_name." ".$student->last_name }}</td>
                        <td><img src="{{ asset('images/profile/students/').'/'.$student->image}}" class="iamge_table"></td>
                        <td>{{ $student->country}}</td>
                        <td>{{ $student->age }}</td>
                        <td>
                        @foreach($student->attendance as $attendance)
                          @if($attendance->attendance_status  == 0)
                            <div>
                              <span class="text-danger font-weight-bold">{{ $attendance->attendance_date}}</span> 
                               <span class="text-danger font-weight-bold">غائب</span>
                            </div>

                          @else
                          <div>
                              <span class="text-success font-weight-bold">{{ $attendance->attendance_date}}</span> 
                               <span class="text-success font-weight-bold">حاضر</span>
                            </div>
                          
                          @endif
                        @endforeach
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Student Name</th>
                          <th>Student Email</th>
                          <th>Country</th>
                          <th>Date</th>
                          <th>Attendance</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
          </div>
        </div>
      </div>
  </div>


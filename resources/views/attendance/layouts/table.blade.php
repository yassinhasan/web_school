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
              <form method="POST" action="{{route('attendance.store') }}">
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
                        <td>{{ $student->first_name." ".$student->last_name }}</td>
                        <td><img src="{{ asset('images/profile/students/').'/'.$student->image}}" class="iamge_table"></td>
                        <td>{{ $student->country}}</td>
                        <td>{{ $student->age }}</td>
                        <td> 
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="attendance[]" id="attendance{{ $student->id }}-1" value="trur" checked>
                            <label class="form-check-label" for="attendance{{ $student->id }}-1">
                              True
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="attendance[]" id="attendance{{ $student->id }}-2" value="false">
                            <label class="form-check-label" for="attendance{{ $student->id }}-2">
                              False
                            </label>
                          </div>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Student Name</th>
                          <th>Student Email</th>
                          <th>Country</th>
                          <th>Age</th>
                          <th>Attendance</th>
                      </tr>
                  </tfoot>
                </table>
                <button class="btn btn-success">Save</button>
              </div>
              </form>
          </div>
        </div>   
      </div>
  </div> 


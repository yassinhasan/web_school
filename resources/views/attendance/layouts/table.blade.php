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
                      <th>Student Email</th>
                      <th>Country</th>
                      <th>Age</th>
                      <th>Attendance</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($students as $student)

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
          </div>
          </div>
        </div>   
      </div>
  </div> 


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
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addZoomModal">
                        {{ __('Add Zoom Metting') }}
            </button>
            <!-- delete selected student  -->
 
            <br><br>
            <!-- end student  -->
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-hover table-bordered p-0">
              <thead>
                  <tr>
                      <th>Topic</th>
                      <th>Start Time</th>
                      <th>Duration</th>
                      <th>Start Url</th>
                      <th>Join Url</th>
                      <th>Process</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($meetings as $meeting)

                    <tr>
                      <td>{{$meeting->topic}}</td>
                      <td>{{$meeting->start_at}}</td>
                      <td>{{$meeting->duration}}</td>
                      <td><a href="{{$meeting->start_url}}">Start Zoom Now</a></td>
                      <td><a href="{{$meeting->join_url}}">Join Now</a></td>

                      <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $meeting->id }}"
                                    title="{{ __('Zoom.Edit') }}"><i
                                    class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $meeting->id }}"
                                    title="{{ __('zoom.Delete') }}"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                  </tr>
                                <!-- edit_modal_student -->
                                @include("dashboard.modals.zoom.editModal")

                                <!-- delete_modal_Student -->
                                @include("dashboard.modals.zoom.deleteModal")
                  @endforeach

              </tbody>
              <tfoot>
                  <tr>
                  <th>Topic</th>
                      <th>Start Time</th>
                      <th>Duration</th>
                      <th>Start Url</th>
                      <th>Join Url</th>
                      <th>Process</th>
                  </tr>
              </tfoot>
              
           </table>
          </div>
          </div>
        </div>   
      </div>
    <!-- include add form modal -->
    @include("dashboard.modals.zoom.addModal")

    <!-- include add form modal -->
  </div> 


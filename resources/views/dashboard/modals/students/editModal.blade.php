<div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <header class="header">
                    <h1 id="title" class="text-center">Edit Student</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <div class="form-wrap">
                    <form id="edit-form" action="{{ route('student.update') }}" method="POST" enctype="multipart/form-data">
                    {{method_field('patch')}}
                    @csrf  
                    <div class="row">
                        <input type="number" name="id" hidden value="{{ $student->id}}">
                        <div class="col-12 form-group">
                            <label  for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Enter your First Name" class="form-control"  value="{{ $student->first_name }}" required>
                        </div>
                        <div class="col-12 form-group">
                            <label  for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Enter your First Name" class="form-control"  value="{{ $student->last_name }}" required>
                        </div>
                        <div class="col-12 form-group">
                            <label  for="age">Age</label>
                            <input type="number" name="age" id="age" placeholder="Enter your First Name" class="form-control"  value="{{ $student->age }}" required>
                        </div>

                        <?php $websites =json_decode($student->website, true) ?>
                        @if($website)
                        @foreach($websites as $website)
                        <div class="col-12">
                                <div class="form-group">
                                    <label  for="website{{$loop->index + 1 }}">Website {{$loop->index +1}}</label>
                                    <input type="url" value="{{$website}}" name="website{{$loop->index +1}}" id="website{{$loop->index + 1}}" placeholder="Enter your Website" class="form-control" >
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-12">
                                <div class="form-group">
                                    <label  for="website1">Website1</label>
                                    <input type="url"  name="website1" id="website1" placeholder="Enter your Website1" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  for="website2">Website2</label>
                                    <input type="url"  name="website2" id="website2" placeholder="Enter your Website2" class="form-control" >
                                </div>
                            </div>                        
                        @endif
                        <!-- select country -->
                        <div class="col-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select  name="country" class="form-control" required>
                                    <option value="ksa" {{$student->country == 'ksa' ? 'selected' : ''}}>Saudi Arabia</option>
                                        <option value="egypt" {{$student->country == 'egypt' ? 'selected' : ''}}>Egypt</option>
                                    </select>
                                </div>
                            </div>
                        <!-- select country -->
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Leave Message About Student</label>
                                    <textarea id="about" class="form-control" name="about" placeholder="Edit your comment here...">{{$student->about}}</textarea>
                                </div>
                        </div>
                        <!-- image upload -->
                                <div class="form-group col-12">
                                    <label class="form-label" for="inputImage">Image:</label>
                                    <input hidden type="file" name="image" id="inputImage" class="edit_student_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <hr>
                                    <hr>
                                    @if($student->image != null)
                                    <div class="image-wraper">
                                         <img class="edit_student_image" src="{{ url('images/profile/students/'.$student->image) }}" style="max-width:100%">
                                    </div>
                                    @endif
                                </div>
                            
                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                    </div>
                </form>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
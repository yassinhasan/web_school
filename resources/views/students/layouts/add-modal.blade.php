<!-- add_modal_student -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <header class="header">
                    <h1 id="title" class="text-center">Add Student</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <div class="form-wrap">
                    <form id="survey-form" class="student-form" action="{{ route('addstudent.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="add_first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" id="add_first_name" placeholder="Enter your First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="add_last_name">Last Name</label>
                                    <input type="text" name="last_name" id="add_last_name" value="{{ old('last_name') }}"  placeholder="Enter your Last Name" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="add_age">Age</label>
                                    <input type="number" name="age" id="add_age" value="{{ old('age') =='' ? 9 :  old('age')}}" min="5" max="99" class="form-control" placeholder="Age">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="add_country">Country</label>
                                    <select id="add_country" name="country" class="form-control" required>
                                        <option disabled selected value>Select</option>
                                        <option value="ksa">Saudi Arabia</option>
                                        <option value="egypt">Egypt</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="add_male" value="male" name="gender" class="custom-control-input" value="male" checked>
                                        <label class="custom-control-label" for="add_male" >Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="add_female" value="female" name="gender" class="custom-control-input" value="female" >
                                        <label class="custom-control-label" for="add_female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="add_about">Leave Message About Student</label>
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
    </div>
</div>
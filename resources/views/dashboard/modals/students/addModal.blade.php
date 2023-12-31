<!-- add_modal_student -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                    <form id="survey-form" action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="name"> Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}"  placeholder="Enter your  Name" class="form-control" required>
                                </div>
                           
                                <div class="form-group">
                                    <label  for="email"> Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"  placeholder="Enter your  Email" class="form-control" required>
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
                                    <label>Country</label>
                                    <select id="add_country" name="country" class="form-control" required>
                                        <option disabled selected value>Select</option>
                                        <option value="ksa">Saudi Arabia</option>
                                        <option value="egypt">Egypt</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- website -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="add_website1">Website 1</label>
                                    <input type="url" name="website1" value="{{ old('website1') }}" id="add_website1" placeholder="Enter your Website" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="add_website2">Website 2</label>
                                    <input type="url" name="website2" value="{{ old('website2') }}" id="add_website2" placeholder="Add another website" class="form-control">
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
                                    <label>Leave Message About Student</label>
                                    <textarea id="add_about" class="form-control" name="about" placeholder="Enter your comment here...">{{old('about')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                                <div class="form-group">
                                    <label class="form-label" for="addinputImage">Image:</label>
                                    <input type="file" name="image" id="addinputImage" class="student_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <hr>
                                    <div class="image-wraper">
                                       <img class="student_image  hide" src="" style="max-width:100%">
                                    </div>
                                </div>
   
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="addStudent" class="btn btn-primary btn-block">Add</button>
                            </div>
                        </div>

                    </form>
                </div>
               
        </div>
    </div>
</div>
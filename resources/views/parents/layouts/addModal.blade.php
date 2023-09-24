<!-- add_modal_student -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <header class="header">
                    <h1 id="title" class="text-center">Asign Students To Parents</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <div class="form-wrap">
                    <form id="survey-form" action="{{ route('parents.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="select_parent"> select parent</label>
                                <select class="form-control" id="select_parent" name="user_id">
                                    @foreach($parents as $parent)
                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach        
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="select_students"> select student</label>
                                <select class="form-control" id="select_students" name="student_id"> 
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->first_name."-".$student->last_name}}</option>
                                    @endforeach        
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
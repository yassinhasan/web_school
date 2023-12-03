<!-- add_modal_student -->
<div class="modal fade" id="addZoomModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <header class="header">
                    <h1 id="title" class="text-center">Add meeting</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <div class="form-wrap">
                    <form id="survey-form" action="{{ route('zoom.store') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="topic">topic</label>
                                    <input id="topic" type="text" name="topic" value="{{ old('topic') }}"  placeholder="Enter topic" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="start_at">start_at</label>
                                    <input id="start_at" type="datetime-local" name="start_at" value="{{ old('start_at') }}"  placeholder="start_at" class="form-control" required>
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
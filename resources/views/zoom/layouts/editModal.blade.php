<div class="modal fade" id="edit{{ $meeting->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <form id="edit-form" action="{{ route('zoom.update') }}" method="POST">
                    {{method_field('patch')}}
                    @csrf  
                    <div class="row">
                        <input type="number" name="id" hidden value="{{ $meeting->id}}">
                        <div class="col-12 form-group">
                            <label  for="topic">First Name</label>
                            <input type="text" name="topic" id="topic" placeholder="Enter your topic" class="form-control"  value="{{ $meeting->topic }}" required>
                        </div>
                        <div class="col-12 form-group">
                            <label  for="start_at">start_at</label>
                            <input type="text" name="start_at" id="start_at" placeholder="Enter start_at" class="form-control"  value="{{ $meeting->start_at }}" required>
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
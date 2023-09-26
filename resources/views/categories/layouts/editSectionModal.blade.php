<div class="modal fade" id="editSection{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="editSectionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <header class="header">
                    <h1 id="title" class="text-center">Edit Section</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <div class="form-wrap">
                    <form id="edit-form" action="{{ route('sections.update') }}" method="POST" >
                    {{method_field('patch')}}
                    @csrf  
                    <div class="row">
                        <input type="number" name="id" hidden value="{{ $section->id}}">
                        <div class="col-12 form-group">
                            <label  for="name">Section Name</label>
                            <input type="text" name="name"  placeholder="Enter Section Name" class="form-control"  value="{{ $section->name }}" required>
                        </div>
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
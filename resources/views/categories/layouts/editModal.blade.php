<div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <header class="header">
                    <h1 id="title" class="text-center">Edit Category</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <div class="form-wrap">
                    <form id="edit-form" action="{{ route('categories.update') }}" method="POST" enctype="multipart/form-data">
                    {{method_field('patch')}}
                    @csrf  
                    <div class="row">
                        <input type="number" name="id" hidden value="{{ $category->id}}">
                        <div class="col-12 form-group">
                            <label  for="name">Category Name</label>
                            <input type="text" name="name" placeholder="Enter Category Name" class="form-control"  value="{{ $category->name }}" required>
                        </div>
                    </div>
                        <!-- image upload -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="inputImage">Image:</label>
                                    <input hidden type="file" name="image" id="inputImage" class="edit_image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <hr>
                                    <hr>
                                    @if($category->image != null)
                                    <img class="edit_image" src="{{ url('images/categories/images/'.$category->image) }}" style="max-width:100%">
                                    @endif
                                </div>
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
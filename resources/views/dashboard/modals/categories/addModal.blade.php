<!-- add_modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <header class="header">
                    <h1 id="title" class="text-center">Add Category</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <div class="form-wrap">
                    <form id="survey-form" class="student-form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label id="" for="add_category">Category Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="add_category" placeholder="Enter Category Name" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="addinputImage">Image:</label>
                                    <input type="file" name="image" id="addinputImage" class="image_input form-control @error('image') is-invalid @enderror" accept="image/jpeg, image/png, image/jpg">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <hr>
                                    <img class="image-element  hide" src="" style="max-width:100%">
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
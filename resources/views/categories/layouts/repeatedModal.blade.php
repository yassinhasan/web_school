	<!-- Modal -->
	<div class="modal fade" id="repeatFormModal" tabindex="-1" role="dialog" aria-labelledby="repeatFormModal" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Add Modal</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <form class="form multiple-form" method="POST" action="{{route('categories.addSub')}}" >
	                @csrf
	                <div class="modal-body">
	                    <div class="clone-wraper">
	                        <div class="clone-inside row">
	                            <div class="mb-3 col-md-5">
									<select class="form-select" aria-label="Default select example" name="id[]">
									@foreach($categories as $category)
	                                    <option value="{{$category->id}}">{{$category->name}}</option>
	                                    @endforeach
	                                </select>
	                            </div>
	                            <div class="mb-3 col-md-5">
	                                <input type="text" class="form-control"  aria-describedby="categoryname" name="name[]" placeholder="Sub-Category Name">
	                            </div>
	                            <div class="mb-3 col-md-2">
	                                <button type="button" class="btn btn-sm btn-danger btn-del-select disabled">delete</button>

	                            </div>
	                        </div>

	                    </div>
	                    <div class="mb-3">
	                        <button type="button" class="btn add-select">add more</button>
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                    <button type="submit" class="btn btn-primary save-multiple">Save changes</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	<!-- modal -->
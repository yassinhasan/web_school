<div class="row">
  <!-- errors -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- errors -->
  <div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">
        <!-- add student  -->
        <button type="button" class="mb-10 btn btn-info" data-toggle="modal" data-target="#addModal">
          {{ __('Add Category') }}
        </button>
        <!-- Button trigger modal -->
        <br><br>
        <!-- end student  -->
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover table-bordered p-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Process</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)

              <tr>
                <td>{{ ucfirst($category->name )}}</td>
                <td><img src="{{ asset('images/categories/images/').'/'.$category->image}}" class="iamge_table"></td>
                <td>
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $category->id }}" title="{{ __('category.Edit') }}"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $category->id }}" title="{{ __('category.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <!-- edit_modal_student -->
              @include("dashboard.modals.categories.editModal")

              <!-- delete_modal_Student -->
              @include("dashboard.modals.categories.deleteModal")
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Process</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- include add form modal -->
  @include("dashboard.modals.categories.addModal")

  <!-- include add form modal -->
</div>

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
        <button type="button" class="button btn btn-secondary" data-toggle="modal" data-target="#addModal">
          {{ __('Add Category') }}
        </button>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn btn-info" data-toggle="modal" data-target="#repeatFormModal">
          Add Section
        </button>
        <!-- delete selected student  -->
        <!-- add section -->
        <button type="button" style="margin: 10px 0;" class="btn btn-danger delete-all" data-toggle="modal" data-target="#deleteAllModal">
          {{ __('Delete Selected Category') }}
        </button>
        <br><br>
        <!-- end student  -->
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover table-bordered p-0">
            <thead>
              <tr>
                <th style="text-align: center;">
                  <input class="box1" type="checkbox" value="" name="" onclick="selectAll('box1',this)">
                </th>
                <th>Name</th>
                <th>Image</th>
                <th>sections</th>
                <th>Process</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)

              <tr>
                <td style="text-align: center;">
                  <input class="box1 checkbox-selected" type="checkbox" value="{{$category->id}}" name="category_id[]">
                </td>
                <td>{{ ucfirst($category->name )}}</td>
                <td><img src="{{ asset('images/categories/images/').'/'.$category->image}}" class="iamge_table"></td>
                <td style="min-width: 200px;">
                  <ul>

                    @foreach($category->sections as $section)
                    <li class="row">
                      <div class="col-6">
                        {{$section->name}}
                      </div>
                      <div class="col-6" style="text-align:end;">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#editSection{{ $section->id }}" title="{{ __('section.Edit') }}"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteSection{{ $section->id }}" title="{{ __('section.Delete') }}"><i class="fa fa-trash"></i></button>
                      </div>
                    </li>
                    <!-- edit_modal_student -->
                    @include("categories.layouts.editSectionModal")

                    <!-- delete_modal_Student -->
                    @include("categories.layouts.deleteSectionModal")
                    @endforeach
                  </ul>
                </td>
                <td>
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $category->id }}" title="{{ __('category.Edit') }}"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $category->id }}" title="{{ __('category.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <!-- edit_modal_student -->
              @include("categories.layouts.editModal")

              <!-- delete_modal_Student -->
              @include("categories.layouts.deleteModal")
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>select</th>
                <th>Name</th>
                <th>Image</th>
                <th>sections</th>
                <th>Process</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- include add form modal -->
  @include("categories.layouts.addModal")

  <!-- include add form modal -->
</div>
@include("categories.layouts.deleteAllModal")
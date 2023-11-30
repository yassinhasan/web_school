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
            <!-- add posts  -->
            <button class="mb-10 btn btn-info"><a href="{{route('courses') }}">Show Courses</a></button>
            <br>
            <a href="{{route('posts.create')}}" class="button x-small">
                        {{ __('Add New Post') }}
            </a>
            <!-- delete selected posts  -->
            <br><br>
            <!-- end student  -->
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-hover table-bordered p-0">
              <thead>
                  <tr>
                      <th>Category </th>
                      <th>Section</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Process</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)

                    <tr>
                     <?php $slug = explode("-",$post->slug);
                        $categoryName = $slug[0];
                     ?>
                    <td>{{ $categoryName}}</td>
                     <td>{{ $post->sections->name}}</td>
                      <td>{{ $post->title}}</td>
                      <td>{{ $post->createdAt}}</td>
                      <td>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm" 
                                    title="{{ __('Post Edit') }}"><i
                                    class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $post->id }}"
                                    title="{{ __('Post Delete') }}"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                  </tr>
                                <!-- edit_modal_posts -->

                                <!-- delete_modal_posts -->
                                @include("posts.layouts.deleteModal")
                  @endforeach

              </tbody>
              <tfoot>
                  <tr>
                    <th>Category </th>
                  <th>section</th>
                      <th>title</th>
                      <th>date</th>
                      <th>Process</th>
                  </tr>
              </tfoot>
              
           </table>
          </div>
          </div>
        </div>   
      </div>
    <!-- include add form modal -->
    <!-- include add form modal -->
  </div> 
  @include("posts.layouts.deleteAllModal")
<!-- search -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <header class="header">
                    <h1 id="title" class="text-center">Search By Students or Parents</h1>
                </header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <div class="form-wrap">
                    <form id="survey-form" action="{{ route('parents.search') }}" method="GET">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label id="name" for="parent-name">Search By Parent Or Student Name</label>
                                    <input type="text" name="name" id="name" placeholder="" class="form-control" >
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
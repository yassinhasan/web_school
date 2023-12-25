<div class="modal fade" id="editor" tabindex="-1" role="dialog" aria-labelledby="editorModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row" style="width: 100%; justify-content: space-between;padding: 0 1rem;margin-bottom: 10px;">
              <h5 class="modal-title" style="font-weight: 800;" id="editorModalLabel">HTML</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-group">
              <textarea class="form-control html_code" placeholder="write your code here" style="font-family: monospace;" id="exampleFormControlTextarea1"
                rows="10"></textarea>
            </div>
            <!-- run -->
            <button type="button" class="btn btn-danger run run_code" style="margin-bottom: 15px;">Run</button>
            
            <div class="embed-responsive embed-responsive-16by9 html_preview_div">
              <iframe class="embed-responsive-item html_preview" style=" border: 1px solid #009688;"></iframe>
            </div>
          </div>  
        </div>
      </div>
    </div>
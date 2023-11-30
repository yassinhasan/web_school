<div class="modal fade" id="deleteSection{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSectionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" >
                    {{ __('Delete section') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sections.destroy')}}" method="post">
                    {{method_field('Delete')}}
                    @csrf
                    {{ __('take care you\'re going to delete this section') }}
                    <input  type="hidden" name="id" class="form-control" value="{{ $section->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
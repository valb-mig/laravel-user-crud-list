<form action="{{$formAction}}" method="{{$formMethod}}" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id={{$modalId}} tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">
                        <i class="fa fa-info"></i> {{$modalTitle}}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    @foreach ($modalInputs as $input)

                        @if (isset($input['label']) && !empty($input['label']))
                            <label>
                                {{$input['label']}}
                            </label>
                        @endif

                        @if ($input['type'] != 'select')
                            <input type="{{$input['type']}}" placeholder="{{$input['placeholder']}}" name="{{$input['name']}}" class="form-control" required/>
                        @else
                            <select placeholder="{{$input['placeholder']}}" name="{{$input['name']}}" class="form-control">
                                {{-- [TODO] --}}
                            </select>
                        @endif

                    @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close" data-dismiss="modal" aria-label="Cancel">
                        <span>Cancel</span>
                    </button>
                    <button type="submit" class="btn btn-success">
                        <span>Submit</span>
                    </button>
                </div>
            </div>
        </div>        
    </div>
</form>
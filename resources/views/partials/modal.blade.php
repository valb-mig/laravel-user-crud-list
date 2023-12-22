<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id={{$modalId}} tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">
                        <i class="fa fa-info"></i> {{$modalTitle}}
                    </h4>
                </div>
                <div class="modal-body">
                    {{$modalBody}}
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
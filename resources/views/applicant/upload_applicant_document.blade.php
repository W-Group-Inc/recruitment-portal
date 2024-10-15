<div class="modal" id="upload{{$document->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Document</h5>
            </div>

            <form action="{{url('new-applicant-document')}}" method="post" enctype="multipart/form-data" onsubmit="show()">
                @csrf

                <input type="hidden" name="document_id" value="{{$document->id}}">
                <input type="hidden" name="applicant_id" value="{{auth()->user()->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Upload Document
                            <input type="file" name="document_form" class="form-control form-control-sm" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
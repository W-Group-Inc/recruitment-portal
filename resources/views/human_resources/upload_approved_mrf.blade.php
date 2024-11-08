<div class="modal" id="upload{{$mrf->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Approved MRF</h5>
            </div>
            <form method="POST" action="{{url('upload-mrf/'.$mrf->id)}}" onsubmit="show()" enctype="multipart/form-data">
                @csrf 

                <div class="modal-body">
                    <div class="form-group">
                        MRF
                        <input type="file" name="upload_approved_mrf" class="form-control form-control-sm" accept=".pdf" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
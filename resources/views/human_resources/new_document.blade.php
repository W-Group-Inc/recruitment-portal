<div class="modal" id="new">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new document</h5>
            </div>
            <form action="{{url('new-document')}}" method="POST" enctype="multipart/form-data" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Document Name
                            <input type="text" name="document_name" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Upload Document
                            <input type="file" name="document_file" class="form-control form-control-sm" required>
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
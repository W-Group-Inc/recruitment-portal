<div class="modal" id="edit{{$document->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit document</h5>
            </div>
            <form action="{{url('update-document/'.$document->id)}}" method="POST" enctype="multipart/form-data" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Document Name
                            <input type="text" name="document_name" class="form-control form-control-sm" value="{{$document->document_name}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Document Status
                            <select name="document_status" class="form-control form-control-sm" required>
                                <option value="">Choose Status</option>
                                <option value="Active" @if($document->document_status == 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if($document->document_status == 'Inactive') selected @endif>Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Upload Document
                            <input type="file" name="document_file" class="form-control form-control-sm">
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
<div class="modal" id="edit{{$company->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('update_company/'.$company->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            Code :
                            <input type="text" name="code" class="form-control form-control-sm" value="{{$company->code}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Name :
                            <input type="text" name="name" class="form-control form-control-sm" value="{{$company->name}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Address :
                            <textarea name="address" class="form-control" cols="30" rows="10" required>{{$company->address}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal" id="returned{{$docs->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Returned Applicant Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('returned-applicant-document/'.$docs->id)}}" onsubmit="show()">
                <div class="modal-body">
                    @csrf 
                    
                    <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                    <div class="form-group">
                        Remarks
                        <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="10" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
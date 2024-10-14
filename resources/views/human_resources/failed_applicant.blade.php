<div class="modal" id="failedApplicant">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Remarks</h5>
            </div>
            <form method="POST" class="d-inline-block" action="{{url('update-status/'.$applicant->id)}}" onsubmit="show()">
                @csrf

                <input type="hidden" name="action" value="failed">
                <input type="hidden" name="interviewer_id" value="{{$i->id}}">
                
                <div class="modal-body">
                    <label>Reason for an applicant's failure </label>
                    <textarea name="remarks" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
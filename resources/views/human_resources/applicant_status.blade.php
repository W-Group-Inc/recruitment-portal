<div class="modal" id="applicantStatus{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Applicant Status</h5>
            </div>
            <form method="POST" action="{{url('update-applicant-status/'.$applicant->id)}}" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        Applicant Status
                        <select name="status" class="form-control cat" required>
                            <option value="">Select applicant status</option>
                            <option value="Passed">Passed</option>
                            <option value="Failed">Failed</option>
                        </select>
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
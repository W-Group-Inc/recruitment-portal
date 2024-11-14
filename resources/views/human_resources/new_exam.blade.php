<div class="modal" id="newExam">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add exam result</h5>
            </div>
            <form action="{{url('add-exam')}}" method="POST" onsubmit="show()">
                @csrf

                <input type="hidden" name="mrf_id" value="{{$applicant->mrf->id}}">
                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Exam Name
                            <input type="text" name="exam_name" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Exam Score
                            <input type="number" step=".01" name="exam_score" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Exam Status
                            <select name="exam_status" class="form-control form-control-sm" required>
                                <option value="">Select status</option>
                                <option value="Passed">Passed</option>
                                <option value="Failed">Failed</option>
                            </select>
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
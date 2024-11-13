<div class="modal" id="jobOffer{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Job Offer</h5>
            </div>
            <form method="POST" action="{{url('add-job-offer')}}" onsubmit="show()">
                @csrf
                
                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Immediate Head
                            <input type="text" name="immediate_head" class="form-control form-control-sm" value="{{optional($applicant->jobOffer)->immediate_head}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Work Schedule
                            <select name="work_schedule" class="form-control form-control-sm cat" required>
                                <option value="">Select work schedule</option>
                                <option value="8:00 - 17:00" @if(optional($applicant->jobOffer)->work_schedule == "8:00 - 17:00") selected @endif>8:00 - 17:00</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Compensation
                            <input type="text" name="compensation" class="form-control form-control-sm" value="{{optional($applicant->jobOffer)->compensation}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Upon Regularization
                            <textarea name="upon_regularization" class="form-control form-control-sm" cols="30" rows="10" required>{{optional($applicant->jobOffer)->upon_regularization}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Others
                            <textarea name="others" class="form-control form-control-sm" cols="30" rows="10">{{optional($applicant->jobOffer)->others}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Start Date
                            <input type="date" name="start_date" class="form-control form-control-sm" min="{{date('Y-m-d')}}" value="{{optional($applicant->jobOffer)->start_date}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if($applicant->jobOffer != null)
                    <a href="{{url('print-jo/'.$applicant->id)}}" class="btn btn-sm btn-danger" target="_blank">Print Job Offer</a>
                    @endif
                    <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
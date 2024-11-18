<div class="modal" id="applicantStatus{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Applicant</h5>
            </div>
            <form method="POST" action="{{url('update-applicant/'.$applicant->id)}}" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="form-group mb-2">
                        Applicant Status
                        <select name="status" class="form-control cat">
                            <option value="">Select applicant status</option>
                            <option value="Passed" @if($applicant->applicant_status == 'Passed') selected @endif>Passed</option>
                            <option value="Failed" @if($applicant->applicant_status == 'Failed') selected @endif>Failed</option>
                        </select>
                    </div>
                    <div class="form-group mb-2" id="sourceColumn">
                        Source
                        <select name="source" class="form-control cat" id="source">
                            <option value="">- Source -</option>
                            <option value="Walk In" @if($applicant->source == 'Walk In') selected @endif>Walk In</option>
                            <option value="PESO" @if($applicant->source == 'PESO') selected @endif>PESO</option>
                            <option value="Advertisement" @if($applicant->source == 'Advertisement') selected @endif>Advertisement</option>
                            <option value="Job Fair" @if($applicant->source == 'Job Fair') selected @endif>Job Fair</option>
                            <option value="Online Application" @if($applicant->source == 'Online Application') selected @endif>Online Application</option>
                            <option value="Employee Referral" @if($applicant->source == 'Employee Referral') selected @endif>Employee Referral</option>
                        </select>
                    </div>
                    @if($applicant->source == 'Online Application')
                        <div class="form-group mb-2 application">
                            Name of application
                            <input type="text" name="application" class="form-control form-control-sm required" value="{{$applicant->application}}" placeholder="Example: Jobstreet, Indeed, etc.">
                        </div>
                    @elseif ($applicant->source == 'Employee Referral')
                        <div class="form-group mb-2 employee">
                            Full name of Employee
                            <input type="text" name="employee" class="form-control form-control-sm required" value="{{$applicant->employee}}" required>
                        </div>
                    @endif
                    <div class="form-group mb-2">
                        Assigned Position
                        <select name="assign_position" class="form-control cat">
                            <option value="">Select position</option>
                            @foreach ($mrf as $m)
                                @php
                                    $job_position = $m->jobPosition;
                                @endphp

                                <option value="{{$job_position->id}}" @if($job_position->id == $applicant->mrf->jobPosition->id) selected @endif>{{$job_position->position}}</option>
                            @endforeach
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
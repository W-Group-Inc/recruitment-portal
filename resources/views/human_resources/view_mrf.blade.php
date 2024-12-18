<div class="modal" id="view{{$m->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">View MRF - ({{$m->mrf_status}})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border border-1 border-primary">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white">MRF Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <strong>I. POSITION</strong>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <strong>Position Title:</strong> {{$m->jobPosition->position}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Department:</strong> {{$m->department->name}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Date Requested:</strong> {{date('M d, Y', strtotime($m->created_at))}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Target Date:</strong>
                                    {{date('M d, Y', strtotime($m->target_date))}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Position Status:</strong>
                                    {{$m->position_status}}
                                </div>
                                @if($m->position_status == 'Replacement')
                                <div class="col-md-12 mb-1">
                                    <strong>Employee:</strong>
                                    {{$m->resign_employee}}
                                </div>
                                @endif
                                @if($m->is_plantilla == 1)
                                <div class="col-md-12 mb-1">
                                    <strong>Plantilla Attachment</strong>
                                    @if(!empty($m->plantilla_attachment))
                                    <a href="{{url($m->plantilla_attachment)}}" target="_blank">
                                        <i class="uil-file"></i>
                                    </a>
                                    @endif
                                </div>
                                @endif
                                @if($m->is_job_description == 1)
                                <div class="col-md-12 mb-1">
                                    <strong>Job Description Attachment</strong>
                                    @if(!empty($m->job_description_attachment))
                                    <a href="{{url($m->job_description_attachment)}}" target="_blank">
                                        <i class="uil-file"></i>
                                    </a>
                                    @endif
                                </div>
                                @endif
                                @if($m->is_resignation_letter == 1)
                                <div class="col-md-12 mb-1">
                                    <strong>Resignation Letter Attachment</strong>
                                    @if(!empty($m->resignation_letter_attachment))
                                    <a href="{{url($m->resignation_letter_attachment)}}" target="_blank">
                                        <i class="uil-file"></i>
                                    </a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <strong>II. QUALIFICATION</strong>
                            </div>
                            <hr>
                            <div class="row mb-0">
                                <div class="col-md-12 mb-1">
                                    <strong>Educational Attainment: </strong> {{$m->educational_attainment}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Work Experience: </strong> {{$m->work_experience}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Special Skills: </strong>{{$m->special_skills}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Others: </strong>{{$m->others}}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <strong>III. EMPLOYMENT DETAILS</strong>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <strong>Employment Status:</strong>
                                    {{$m->employment_status}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Job Level / Grade:</strong>
                                    {{$m->job_level}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Salary Rate / Range:</strong>
                                    {{$m->salary_range}}
                                </div>
                                <div class="col-md-12 mb-1">
                                    <strong>Others Remarks:</strong>
                                    {{$m->other_remarks}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <strong>Remarks :</strong>
                                {!! nl2br($m->approver_remarks) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                {{-- @if($m->mrf_status == 'Pending')
                <button class="btn btn-success" type="submit">Save</button>
                @endif --}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
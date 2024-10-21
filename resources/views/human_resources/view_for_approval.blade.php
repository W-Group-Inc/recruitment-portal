<div class="modal" id="view{{$m->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">View MRF - ({{$m->mrf_status}})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('mrf-action/'.$m->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    {{-- <div class="row">
                        <div class="col-md-12">
                            Code :
                            <input type="text" name="code" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-12">
                            Name :
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>
                    </div> --}}
                    <div class="card border border-1 border-primary">
                        <div class="card-header bg-primary">
                            <h5 class="card-title text-white">MRF Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <strong>I. POSITION</strong>
                                </div>
                                <hr>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Position Title :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->jobPosition->position}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Department :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->department->name}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Date Requested :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{date('M d, Y', strtotime($m->created_at))}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Target Date :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{date('M d, Y', strtotime($m->target_date))}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Position Status :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->position_status}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Attachment
                                    </dt>
                                    <dd class="col-md-9">
                                        @if($m->is_plantilla == 1)
                                        Plantilla
                                        <a href="{{url($m->mrf_attachment)}}" target="_blank">
                                            <i class="uil-file"></i>
                                        </a>
                                        @endif
    
                                        @if($m->is_job_description == 1)
                                        Job Description
                                        <a href="{{url($m->mrf_attachment)}}" target="_blank">
                                            <i class="uil-file"></i>
                                        </a>
                                        @endif

                                        @if($m->is_resignation_letter == 1)
                                        Resignation Letter
                                        <a href="{{url($m->mrf_attachment)}}" target="_blank">
                                            <i class="uil-file"></i>
                                        </a>
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <strong>II. QUALIFICATION</strong>
                                </div>
                                <hr>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Educational Attainment:
                                    </dt>
                                    <dd class="col-md-9  ">
                                        {{$m->educational_attainment}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Work Experience :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->work_experience}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Special Skills :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->special_skills}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Others :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->others}}
                                    </dd>
                                </dl>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <strong>III. EMPLOYMENT DETAILS</strong>
                                </div>
                                <hr>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Employment Status :
                                    </dt>
                                    <dd class="col-md-9  ">
                                        {{$m->employment_status}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Job Level / Grade :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->job_level}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Salary Rate / Range :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->salary_range}}
                                    </dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-md-3">
                                        Others Remarks :
                                    </dt>
                                    <dd class="col-md-9">
                                        {{$m->other_remarks}}
                                    </dd>
                                </dl>
                            </div>
                            @if($m->mrf_status == 'Pending')
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Action :
                                    <select name="action" class="form-control form-control-sm cat">
                                        <option value="">-Select </option>
                                        <option value="Approved">Approve</option>
                                        <option value="Returned">Return</option>
                                        <option value="Rejected">Reject</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    Remarks :
                                    <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    @if($m->mrf_status == 'Pending')
                    <button class="btn btn-success" type="submit">Save</button>
                    @endif
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
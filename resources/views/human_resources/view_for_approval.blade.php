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
                                    <div class="col-md-12 mb-1">
                                        <strong>Attachment:</strong> <br>
                                        @foreach ($m->mrfAttachment as $key=>$attachment)
                                            <small>{{$key+1}} .</small>
                                            <a href="{{url($attachment->file_path)}}" target="_blank">
                                                <i class="uil-file"></i>
                                            </a>
                                            <br>
                                        @endforeach
                                    </div>
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
                            @if($m->mrf_status == 'Pending')
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    Action :
                                    <select name="action" class="form-control form-control-sm cat">
                                        <option value="">-Select </option>
                                        <option value="Approved">Approve</option>
                                        {{-- <option value="Returned">Return</option> --}}
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
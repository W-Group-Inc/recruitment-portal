<div class="modal" id="add" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add New MRF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('new-mrf')}}" onsubmit="show()" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    <h3>Position</h3>
                    <div class="row mb-3">
                        {{-- <div class="col-md-12">
                            <h5 class="header-title">I. Position</h5>
                            <hr>
                        </div> --}}
                        <div class="col-md-6 mb-1">
                            Position Title
                            {{-- <input type="text" name="position_title" class="form-control form-control-sm" required> --}}
                            @if(auth()->user()->role == 'Human Resources Manager')
                            <select name="job_position" class="form-control cat" required>
                                <option value="">Select Job Position</option>
                                @foreach ($job_positions as $job_position)
                                    <option value="{{$job_position->id}}">{{$job_position->position}}</option>
                                @endforeach
                            </select>
                            @else
                            <select name="job_position" class="form-control cat" required>
                                <option value="">Select Job Position</option>
                                @foreach ($job_positions->where('department_id', auth()->user()->department_id) as $job_position)
                                    <option value="{{$job_position->id}}">{{$job_position->position}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="col-md-6 mb-1">
                            Department
                            @if(auth()->user()->role == 'Human Resources Manager')
                            <select class="form-control cat" name="department" required>
                                <option value="">Select department</option>
                                @foreach ($departments as $d)
                                    <option value="{{$d->id}}">{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                            @else
                            <select class="form-control cat" name="department" required>
                                {{-- <option value="">-Department-</option> --}}
                                @foreach ($departments->where('id', auth()->user()->department_id) as $d)
                                    <option value="{{$d->id}}">{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="col-md-6 mb-1">
                            Company
                            <select class="form-control cat" name="company" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $c)
                                    <option value="{{$c->id}}">{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-6 mb-1">
                            Target Date of On-boarding:
                            <input type="date" name="target_date" class="form-control form-control-sm" min="{{date('Y-m-d', strtotime("+1 month"))}}" required>
                        </div> --}}
                        <div class="col-md-6 mb-1">
                            Position Status
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control position_status cat" name="position_status">
                                <option value="">-Position Status-</option>
                                <option value="Replacement">Replacement</option>
                                <option value="New Position">New Position</option>
                                <option value="Additional">Additional</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-1 replacementOf" style="display: none;">
                            Replacement of
                            <select class="form-control cat" name="replacement">
                                <option value="">-Employee-</option>
                                @foreach ($resign_employee as $resign_emp)
                                    <option value="{{$resign_emp->first_name .' '.$resign_emp->last_name}}">{{$resign_emp->first_name .' '.$resign_emp->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-1">
                            Justification
                            <textarea name="justification" class="form-control form-control-sm" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="col-md-12 mb-1">
                            Attach the following

                            <div class="row">
                                <div class="col-md-4 mb-1">
                                    <div class="form-check">
                                        <input type="checkbox" id="plantilla" class="form-check-input" name="is_plantilla">
                                        <label class="form-check-label" for="plantilla">Plantilla</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-check">
                                        <input type="checkbox" id="job_description" class="form-check-input" name="is_job_description">
                                        <label class="form-check-label" for="job_description">Job Description</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <div class="form-check">
                                        <input type="checkbox" id="resignationLetter" class="form-check-input" name="is_resignation_letter">
                                        <label class="form-check-label" for="resignationLetter">Resignation Letter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 plantilla">

                        </div>
                        <div class="col-md-4 job_description">

                        </div>
                        <div class="col-md-4 resignation_letter">

                        </div>
                        {{-- <div class="col-md-12 mb-1">
                            Upload Attachment
                            <input type="file" name="mrf_attachment[]" class="form-control form-control-sm" accept=".pdf" multiple required>
                        </div> --}}
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h3>Qualification</h3>
                        <div class="col-md-6 mb-1">
                            Educational Attainment (Degree)
                            <input type="text" name="educational_attainment" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Work Experience (Years)
                            <input type="text" name="work_experience" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Specific Field
                            <input type="text" name="specific_field" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Special Skills
                            <input type="text" name="special_skills" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Others
                            <input type="text" name="others" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h3>Employment Details</h3>
                        <div class="col-md-6 mb-1">
                            Employment Status
                            <select class="form-control cat" name="employment_status" required>
                                <option value="">-Employment Status-</option>
                                @foreach ($employment_status as $key=>$es)
                                    <option value="{{$key}}">{{$es}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Job Level 
                            <select class="form-control cat" name="job_level" required>
                                <option value="">-Job Level-</option>
                                @foreach ($job_level as $key=>$jl)
                                    <option value="{{$key}}">{{$jl}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Salary Rate
                            <input type="text" name="salary_rate" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Other Remarks
                            <textarea name="other_remarks" class="form-control form-control-sm" cols="30" rows="10" ></textarea>
                        </div>
                        {{-- <hr>
                        <h3>Assign Recruiter</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="recruiter" class="form-control form-control-sm cat" required>
                                    <option value="">Select Recruiter</option>
                                    @foreach ($user->where('role', 'Human Resources') as $recruiter)
                                        <option value="{{$recruiter->id}}">{{$recruiter->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
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
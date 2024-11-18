<div class="modal" id="edit{{$m->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit MRF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('update-mrf/'.$m->id)}}" onsubmit="show()" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    <div class="row mb-3">
                        <h2>Position</h2>
                        <div class="col-md-6 mb-1">
                            Position Title :
                            {{-- <input type="text" name="position_title" class="form-control form-control-sm" value="{{$m->position_title}}" required> --}}
                            <select name="job_position" class="form-control cat" required>
                                <option value="">Select Job Position</option>
                                @foreach ($job_positions as $job_position)
                                    <option value="{{$job_position->id}}" @if($job_position->id == $m->job_position_id) selected @endif>{{$job_position->position}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Department :
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
                            Company :
                            <select class="form-control cat" name="company" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $c)
                                    <option value="{{$c->id}}" @if($c->id == $m->company_id) selected @endif>{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-6">
                            Target Date :
                            <input type="date" name="target_date" class="form-control form-control-sm" value="{{$m->target_date}}" required>
                        </div> --}}
                        <div class="col-md-6 mb-1">
                            Position Status :
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control position_status cat" name="position_status">
                                <option value="">-Position Status-</option>
                                <option value="Replacement" @if($m->position_status == "Replacement") selected @endif>Replacement</option>
                                <option value="New Position" @if($m->position_status == "New Position") selected @endif>New Position</option>
                                <option value="Additional" @if($m->position_status == "Additional") selected @endif>Additional</option>
                            </select>
                        </div>
                        @if($m->resign_employee != null)
                            <div class="col-md-12 mb-1 replacementOf">
                                Replacement of :
                                <select class="form-control cat" name="replacement">
                                    <option value="">-Employee-</option>
                                    @foreach ($resign_employee as $resign_emp)
                                        @php
                                            $full_name = $resign_emp->first_name .' '.$resign_emp->last_name;
                                        @endphp
                                        <option value="{{$resign_emp->first_name .' '.$resign_emp->last_name}}" @if($full_name == $m->resign_employee) selected @endif>{{$resign_emp->first_name .' '.$resign_emp->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="col-md-12 mb-1 replacementOf" style="display: none;">
                                Replacement of :
                                <select class="form-control cat" name="replacement">
                                    <option value="">-Employee-</option>
                                    @foreach ($resign_employee as $resign_emp)
                                        <option value="{{$resign_emp->first_name .' '.$resign_emp->last_name}}">{{$resign_emp->first_name .' '.$resign_emp->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-md-6 mb-1">
                            Justification :
                            <textarea name="justification" class="form-control form-control-sm" cols="30" rows="10" required>{{$m->justification}}</textarea>
                        </div>
                        <div class="col-md-12 mb-1">
                            Attach the following :

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" id="plantilla" class="form-check-input" name="is_plantilla" @if($m->is_plantilla == 1) checked @endif>
                                        <label class="form-check-label" for="plantilla">Plantilla</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" id="job_description" class="form-check-input" name="is_job_description" @if($m->is_job_description == 1) checked @endif>
                                        <label class="form-check-label" for="job_description">Job Description</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" id="job_description" class="form-check-input" name="is_job_description" @if($m->is_resignation_letter == 1) checked @endif>
                                        <label class="form-check-label" for="job_description">Resignation Letter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            Upload Attachment :
                            <input type="file" name="mrf_attachment[]" class="form-control form-control-sm" accept=".pdf" multiple>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h2>Qualification</h2>
                        <div class="col-md-6 mb-1">
                            Educational Attainment (Degree) :
                            <input type="text" name="educational_attainment" class="form-control form-control-sm" value="{{$m->educational_attainment}}" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Work Experience (Years) :
                            <input type="text" name="work_experience" class="form-control form-control-sm" value="{{$m->work_experience}}" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Specific Field :
                            <input type="text" name="specific_field" class="form-control form-control-sm" value="{{$m->specific_field}}" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Special Skills :
                            <input type="text" name="special_skills" class="form-control form-control-sm" value="{{$m->special_skills}}" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Others :
                            <input type="text" name="others" class="form-control form-control-sm" value="{{$m->others}}" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h2>Employment Details</h2>
                        <div class="col-md-6 mb-1">
                            Employment Status :
                            <select class="form-control cat" name="employment_status" required>
                                <option value="">-Employment Status-</option>
                                @foreach ($employment_status as $key=>$es)
                                    <option value="{{$key}}" @if($m->employment_status == $key) selected @endif>{{$es}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Job Level :
                            <select class="form-control cat" name="job_level" required>
                                <option value="">-Job Level-</option>
                                @foreach ($job_level as $key=>$jl)
                                    <option value="{{$key}}" @if($m->job_level == $key) selected @endif>{{$jl}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Salary Rate
                            <input type="text" name="salary_rate" class="form-control form-control-sm" value="{{$m->salary_range}}" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Other Remarks :
                            <textarea name="other_remarks" class="form-control form-control-sm" cols="30" rows="10" required>{{$m->other_remarks}}</textarea>
                        </div>
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
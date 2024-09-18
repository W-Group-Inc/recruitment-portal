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
                        <div class="col-md-12">
                            <h5 class="header-title">I. Position</h5>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            Position Title :
                            <input type="text" name="position_title" class="form-control form-control-sm" value="{{$m->position_title}}" required>
                        </div>
                        <div class="col-md-12">
                            Department :
                            <select class="form-control cat" name="department" required>
                                <option value="">-Department-</option>
                                @foreach ($departments->where('id', auth()->user()->department_id) as $d)
                                    <option value="{{$d->id}}" @if($d->id == $m->department_id) selected @endif>{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Company :
                            <select class="form-control cat" name="company" required>
                                <option value="">-Company-</option>
                                @foreach ($companies as $c)
                                    <option value="{{$c->id}}" @if($c->id == $m->company_id) selected @endif>{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Target Date :
                            <input type="date" name="target_date" class="form-control form-control-sm" value="{{$m->target_date}}" required>
                        </div>
                        <div class="col-md-12">
                            Position Status :
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control position_status cat" name="position_status">
                                <option value="">-Position Status-</option>
                                <option value="Replacement" @if($m->position_status == "Replacement") selected @endif>Replacement</option>
                                <option value="New Position" @if($m->position_status == "New Position") selected @endif>New Position</option>
                                <option value="Additional" @if($m->position_status == "Additional") selected @endif>Additional</option>
                            </select>
                        </div>
                        <div class="col-md-12 replacementOf" style="display: none;">
                            Replacement of :
                            {{-- <select class="form-control cat" name="company">
                                <option value="">-Company-</option>
                                @foreach ($companies as $c)
                                    <option value="{{$c->id}}">{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="col-md-12">
                            Justification :
                            <textarea name="justification" class="form-control form-control-sm" cols="30" rows="10" required>{{$m->justification}}</textarea>
                        </div>
                        <div class="col-md-12">
                            Attach the following :

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" id="plantilla" class="form-check-input" name="is_plantilla" @if($m->is_plantilla == 1) checked @endif>
                                        <label class="form-check-label" for="plantilla">Plantilla</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" id="job_description" class="form-check-input" name="is_job_description" @if($m->is_job_description == 1) checked @endif>
                                        <label class="form-check-label" for="job_description">Job Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            Upload Attachment :
                            <input type="file" name="mrf_attachment" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="header-title">II. Qualification</h5>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            Educational Attainment (Degree) :
                            <input type="text" name="educational_attainment" class="form-control form-control-sm" value="{{$m->educational_attainment}}" required>
                        </div>
                        <div class="col-md-12">
                            Work Experience (Years) :
                            <input type="text" name="work_experience" class="form-control form-control-sm" value="{{$m->work_experience}}" required>
                        </div>
                        <div class="col-md-12">
                            Specific Field :
                            <input type="text" name="specific_field" class="form-control form-control-sm" value="{{$m->specific_field}}" required>
                        </div>
                        <div class="col-md-12">
                            Special Skills :
                            <input type="text" name="special_skills" class="form-control form-control-sm" value="{{$m->special_skills}}" required>
                        </div>
                        <div class="col-md-12">
                            Others :
                            <input type="text" name="others" class="form-control form-control-sm" value="{{$m->others}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="header-title">III. Employment Details</h5>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            Employment Status :
                            <select class="form-control cat" name="employment_status" required>
                                <option value="">-Employment Status-</option>
                                @foreach ($employment_status as $key=>$es)
                                    <option value="{{$key}}" @if($m->employment_status == $key) selected @endif>{{$es}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Job Level :
                            <select class="form-control cat" name="job_level" required>
                                <option value="">-Job Level-</option>
                                @foreach ($job_level as $key=>$jl)
                                    <option value="{{$key}}" @if($m->job_level == $key) selected @endif>{{$jl}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Salary Rate
                            <input type="text" name="salary_rate" class="form-control form-control-sm" value="{{$m->salary_range}}" required>
                        </div>
                        <div class="col-md-12">
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
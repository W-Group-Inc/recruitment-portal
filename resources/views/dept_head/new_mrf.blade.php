<div class="modal" id="add" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add new MRF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('new-mrf')}}" onsubmit="show()" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">
                    <h2>Position</h2>
                    <div class="row mb-3">
                        {{-- <div class="col-md-12">
                            <h5 class="header-title">I. Position</h5>
                            <hr>
                        </div> --}}
                        <div class="col-md-6 mb-1">
                            Position Title :
                            <input type="text" name="position_title" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Department :
                            <select class="form-control cat" name="department" required>
                                {{-- <option value="">-Department-</option> --}}
                                @foreach ($departments->where('id', auth()->user()->department_id) as $d)
                                    <option value="{{$d->id}}">{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Company :
                            <select class="form-control cat" name="company" required>
                                @foreach ($companies->where('id', auth()->user()->department->company->id) as $c)
                                    <option value="{{$c->id}}">{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Target Date of On-boarding:
                            <input type="date" name="target_date" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Position Status :
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control position_status cat" name="position_status">
                                <option value="">-Position Status-</option>
                                <option value="Replacement">Replacement</option>
                                <option value="New Position">New Position</option>
                                <option value="Additional">Additional</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-1 replacementOf" style="display: none;">
                            Replacement of :
                            <select class="form-control cat" name="replacement">
                                <option value="">-Employee-</option>
                                
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Justification :
                            <textarea name="justification" class="form-control form-control-sm" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="col-md-12 mb-1">
                            Attach the following :

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
                        <div class="col-md-12 mb-1">
                            Upload Attachment :
                            <input type="file" name="mrf_attachment" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <h2>Qualification</h2>
                        <div class="col-md-6 mb-1">
                            Educational Attainment (Degree) :
                            <input type="text" name="educational_attainment" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Work Experience (Years) :
                            <input type="text" name="work_experience" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Specific Field :
                            <input type="text" name="specific_field" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Special Skills :
                            <input type="text" name="special_skills" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            Others :
                            <input type="text" name="others" class="form-control form-control-sm" required>
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
                                    <option value="{{$key}}">{{$es}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-1">
                            Job Level :
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
                            Other Remarks :
                            <textarea name="other_remarks" class="form-control form-control-sm" cols="30" rows="10" required></textarea>
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
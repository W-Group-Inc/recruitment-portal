<div class="modal" id="editExam{{$ex_res->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit exam result</h5>
            </div>
            <form action="{{url('update-exam/'.$ex_res->id)}}" method="POST" onsubmit="show()">
                @csrf

                <input type="hidden" name="mrf_id" value="{{$applicant->mrf->id}}">
                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Critical Thinking Assessment :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="Poor" @if($ex_res->critical_thinking == 'Poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="Below Average" @if($ex_res->critical_thinking == 'Below Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="Average" @if($ex_res->critical_thinking == 'Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="Above Average" @if($ex_res->critical_thinking == 'Above Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="Excellent" @if($ex_res->critical_thinking == 'Excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12dwad mb-2">
                            <p class="h5"> DISC Personality Profile</p>
                            <input type="text" id="customRadio1" name="disc_personality" class="form-control form-control-sm" value="{{$ex_res->disc_personality}}" >
                        </div>
                        @if($applicant->mrf->job_level == 'Supervisory')
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Supervisory Skills Test :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="Poor" @if($ex_res->supervisory_skills == 'Poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="Below Average" @if($ex_res->supervisory_skills == 'Below Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="Average" @if($ex_res->supervisory_skills == 'Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="Above Average" @if($ex_res->supervisory_skills == 'Above Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="Excellent" @if($ex_res->supervisory_skills == 'Excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($applicant->mrf->job_level == 'Managerial')
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Managerial Skills Test :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="Poor" @if($ex_res->managerial_skills == 'Poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="Below Average" @if($ex_res->managerial_skills == 'Below Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="Average" @if($ex_res->managerial_skills == 'Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="Above Average" @if($ex_res->managerial_skills == 'Above Average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="Excellent" @if($ex_res->managerial_skills == 'Excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(accountingDepartment($applicant->mrf->department_id))
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Accounting Skills Test</p>
                            <input type="text" id="customRadio1" name="accounting_skills" class="form-control form-control-sm" value="{{$ex_res->accounting_skills}}" >
                        </div>
                        @endif
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
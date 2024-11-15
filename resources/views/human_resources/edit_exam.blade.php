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
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="poor" @if($ex_res->critical_thinking == 'poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="below_average" @if($ex_res->critical_thinking == 'below_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="average" @if($ex_res->critical_thinking == 'average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="above_average" @if($ex_res->critical_thinking == 'above_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="excellent" @if($ex_res->critical_thinking == 'excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12dwad mb-2">
                            <p class="h5"> DISC Personality Profile</p>
                            <input type="text" id="customRadio1" name="disc_personality" class="form-control form-control-sm" value="{{$ex_res->disc_personality}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Supervisory Skills Test :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="poor" @if($ex_res->supervisory_skills == 'poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="below_average" @if($ex_res->supervisory_skills == 'below_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="average" @if($ex_res->supervisory_skills == 'average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="above_average" @if($ex_res->supervisory_skills == 'above_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="excellent" @if($ex_res->supervisory_skills == 'excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Managerial Skills Test :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="poor" @if($ex_res->managerial_skills == 'poor') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="below_average" @if($ex_res->managerial_skills == 'below_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="average" @if($ex_res->managerial_skills == 'average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="above_average" @if($ex_res->managerial_skills == 'above_average') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="excellent" @if($ex_res->managerial_skills == 'excellent') checked @endif>
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Accounting Skills Test</p>
                            <input type="text" id="customRadio1" name="accounting_skills" class="form-control form-control-sm" value="{{$ex_res->accounting_skills}}" required>
                        </div>
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
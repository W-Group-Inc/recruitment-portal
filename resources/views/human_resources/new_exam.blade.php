<div class="modal" id="newExam">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add exam result</h5>
            </div>
            <form action="{{url('add-exam')}}" method="POST" onsubmit="show()">
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
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="poor">
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="below_average">
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="average">
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="above_average">
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="critical_thinking" class="form-check-input" value="excellent">
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12dwad mb-2">
                            <p class="h5"> DISC Personality Profile</p>
                            <input type="text" id="customRadio1" name="disc_personality" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Supervisory Skills Test :</p>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="poor">
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="below_average">
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="average">
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="above_average">
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="supervisory_skills" class="form-check-input" value="excellent">
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
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="poor">
                                        <label class="form-check-label" for="customRadio1">Poor</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="below_average">
                                        <label class="form-check-label" for="customRadio1">Below Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input" value="average">
                                        <label class="form-check-label" for="customRadio1">Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="above_average">
                                        <label class="form-check-label" for="customRadio1">Above Average</label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="managerial_skills" class="form-check-input"  value="excellent">
                                        <label class="form-check-label" for="customRadio1">Excellent</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <p class="h5">Accounting Skills Test</p>
                            <input type="text" id="customRadio1" name="accounting_skills" class="form-control form-control-sm" required>
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
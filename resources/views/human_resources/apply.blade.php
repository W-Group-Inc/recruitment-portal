<div class="modal" id="apply{{$mrf->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apply</h5>
            </div>
            <form method="POST" action="{{url('add-applicant')}}" onsubmit="show()" enctype="multipart/form-data">
                @csrf 

                <input type="hidden" name="mrf_id" value="{{$mrf->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Last Name:
                            <input type="text" name="lastname" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            First Name:
                            <input type="text" name="firstname" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Middle Name: 
                            <input type="text" name="middlename" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-12 mb-2">
                            Email:
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Resume (Choose file to Upload):
                            <input type="file" name="resume" class="form-control form-control-sm" accept=".pdf" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Availability to Start:
                            <input type="date" name="date_availability" class="form-control form-control-sm" min="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Previous Compensation:
                            <input type="text" name="previous_compensation" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Asking Compensation:
                            <input type="text" name="asking_compensation" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Mobile Number:
                            <input type="tel" name="mobile_number" class="form-control form-control-sm" data-mask="00000000000" placeholder="Ex: 09" required>
                        </div>
                        <div class="col-lg-12 mb-2" id="sourceColumn">
                            Source of Application:
                            <select name="source" class="form-control cat" id="source">
                                <option value="">- Source -</option>
                                <option value="Walk In">Walk In</option>
                                <option value="PESO">PESO</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Job Fair">Job Fair</option>
                                <option value="Online Application">Online Application</option>
                                <option value="Employee Referral">Employee Referral</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
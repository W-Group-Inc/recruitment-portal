<div class="modal" id="edit{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Applicant</h5>
            </div>
            <form method="POST" action="{{url('update-applicant/'.$applicant->id)}}" enctype="multipart/form-data" onsubmit="show()">
                @csrf
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            Lastname
                            <input type="text" name="lastname" class="form-control form-control-sm" value="{{$applicant->lastname}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Firstname
                            <input type="text" name="firstname" class="form-control form-control-sm" value="{{$applicant->firstname}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Middlename <small><i>(Add N/A if not applicable)</i></small>
                            <input type="text" name="middlename" class="form-control form-control-sm" value="{{$applicant->middlename}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Email
                            <input type="email" name="email" class="form-control form-control-sm" value="{{$applicant->email}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Mobile Number
                            <input type="text" name="mobile_number" class="form-control form-control-sm" value="{{$applicant->mobile_number}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Position
                            {{-- <input type="text" name="posi" class="form-control form-control-sm" required> --}}
                            <select name="position" class="form-control cat">
                                <option value="">Select Position</option>
                                @foreach ($mrf as $m)
                                    {{-- <option value="{{$m->id}}" @if($m->id == $applicant->man_power_requisition_form_id) selected @endif>{{$m->position_title}}</option> --}}
                                    <option value="{{$m->id}}" @if($m->id == $applicant->man_power_requisition_form_id) selected @endif>{{$m->jobPosition->position}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            Resume
                            <input type="file" name="resume" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
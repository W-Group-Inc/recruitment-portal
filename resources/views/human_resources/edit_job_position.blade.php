<div class="modal" id="edit{{$jp->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit job description</h5>
            </div>
            <form action="{{url('update-job-position/'.$jp->id)}}" method="POST" enctype="multipart/form-data" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Company
                            <select name="company" class="form-control cat" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" @if($company->id == $jp->company_id) selected @endif>{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Department
                            <select name="department" class="form-control cat" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}" @if($department->id == $jp->department_id) selected @endif>{{$department->code.' - '.$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Position
                            <input type="text" name="position" class="form-control form-control-sm" value="{{$jp->position}}" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Position Summary
                            <textarea name="position_summary" class="form-control form-control-sm" cols="30" rows="10">{{$jp->position_summary}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Duties and Responsibility
                            <textarea name="duties_and_responsibility" class="form-control form-control-sm" cols="30" rows="10">{{$jp->duties_and_responsibility}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Approval Authority
                            <textarea name="approval_authority" class="form-control form-control-sm" cols="30" rows="10">{{$jp->approval_authority}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Minimum Requirements
                            <textarea name="minimum_requirements" class="form-control form-control-sm" cols="30" rows="10">{{$jp->minimum_requirements}}</textarea>
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
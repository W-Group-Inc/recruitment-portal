<div class="modal" id="new">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add job description</h5>
            </div>
            <form action="{{url('new-job-position')}}" method="POST" enctype="multipart/form-data" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            Company
                            <select name="company" class="form-control cat" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Department
                            <select name="department" class="form-control cat" required>
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->code.' - '.$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Position
                            <input type="text" name="position" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Position Summary
                            <textarea name="position_summary" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Duties and Responsibility
                            <textarea name="duties_and_responsibility" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Approval Authority
                            <textarea name="approval_authority" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Minimum Requirements
                            <textarea name="minimum_requirements" class="form-control form-control-sm" cols="30" rows="10"></textarea>
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
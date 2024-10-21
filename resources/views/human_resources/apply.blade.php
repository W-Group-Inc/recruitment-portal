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
                            Last name
                            <input type="text" name="lastname" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            First name
                            <input type="text" name="firstname" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Middle name 
                            <input type="text" name="middlename" class="form-control form-control-sm">
                        </div>
                        <div class="col-lg-12 mb-2">
                            Email
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Upload Resume
                            <input type="file" name="resume" class="form-control form-control-sm" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
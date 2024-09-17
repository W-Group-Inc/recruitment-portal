<div class="modal" id="password{{$user->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('change-password/'.$user->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            New Password :
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-12">
                            Confirm Password :
                            <input type="password" name="password_confirmation" class="form-control form-control-sm" required>
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
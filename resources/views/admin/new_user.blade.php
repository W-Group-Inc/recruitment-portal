<div class="modal" id="addModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add new user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('add_user')}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Name :
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-12">
                            Email :
                            <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-12">
                            Company :
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control select2" name="company" data-toggle="select2" required>
                                <option value="">-Company-</option>
                                @foreach ($company as $c)
                                    <option value="{{$c->id}}">{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Department :
                            <select class="form-control select2" name="department" data-toggle="select2" required>
                                <option value="">-Department-</option>
                                @foreach ($department as $d)
                                    <option value="{{$d->id}}">{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Role :
                            <select class="form-control select2" name="role" data-toggle="select2" required>
                                <option value="">-Role-</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Chairman">Chairman</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Department Head">Department Head</option>
                            </select>
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
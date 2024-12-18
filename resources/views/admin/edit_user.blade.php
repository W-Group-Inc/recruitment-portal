<div class="modal" id="editUser{{$user->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('update_user/'.$user->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            Prefix :
                            <select name="prefix" class="form-control" required>
                                <option value="">Select prefix</option>
                                <option value="Ms." @if($user->prefix == 'Ms.') selected @endif>Ms.</option>
                                <option value="Mr." @if($user->prefix == 'Mr.') selected @endif>Mr.</option>
                                <option value="Mrs." @if($user->prefix == 'Mrs.') selected @endif>Mrs.</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            Name :
                            <input type="text" name="name" class="form-control form-control-sm" value="{{$user->name}}" readonly required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Email :
                            <input type="email" name="email" class="form-control form-control-sm" value="{{$user->email}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            Company :
                            {{-- <input type="text" name="name" class="form-control form-control-sm" required> --}}
                            <select class="form-control cat" name="company" required>
                                <option value="">-Company-</option>
                                @foreach ($company as $c)
                                    <option value="{{$c->id}}" @if($c->id == $user->company_id) selected @endif>{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            Department :
                            <select class="form-control cat" name="department" required>
                                <option value="">-Department-</option>
                                @foreach ($department as $d)
                                    <option value="{{$d->id}}" @if($d->id == $user->department_id) selected @endif>{{$d->code .' - '.$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            Role :
                            <select class="form-control cat" name="role" required>
                                <option value="">-Role-</option>
                                <option value="Administrator" @if($user->role == "Administrator") selected @endif>Administrator</option>
                                <option value="Chairman" @if($user->role == "Chairman") selected @endif>Chairman</option>
                                <option value="Human Resources" @if($user->role == "Human Resources") selected @endif>Human Resources</option>
                                <option value="Department Head" @if($user->role == "Department Head") selected @endif>Department Head</option>
                                <option value="Head Business Unit" @if($user->role == "Head Business Unit") selected @endif>Head Business Unit</option>
                                <option value="Human Resources Manager" @if($user->role == "Human Resources Manager") selected @endif>Human Resources Manager</option>
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
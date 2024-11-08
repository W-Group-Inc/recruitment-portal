{{-- <div class="modal" id="assign{{$m->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Recruiter</h5>
            </div>
            <form method="POST" action="{{url('assign-recruiter/'.$m->id)}}" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        Assign Recruiter
                        <select name="recruiter" class="form-control cat">
                            <option value="">Select Recruiter</option>
                            @foreach ($user->whereIn('role', ['Human Resources', 'Human Resources Manager']) as $recruit)
                            <option value="{{$recruit->id}}">{{$recruit->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="modal" id="recruiter{{$m->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Recruiter</h5>
            </div>
            <form method="POST" action="{{url('assign-recruiter/'.$m->id)}}" onsubmit="show()">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        Assign Recruiter
                        <select name="recruiter" class="form-control cat">
                            <option value="">Select Recruiter</option>
                            @foreach ($recruiter->whereIn('role', ['Human Resources', 'Human Resources Manager']) as $recruit)
                            <option value="{{$recruit->id}}">{{$recruit->name}}</option>
                            @endforeach
                        </select>
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
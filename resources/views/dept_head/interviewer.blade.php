<div class="modal" id="interviewer{{$m->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Interviewer</h5>
            </div>
            <form method="POST" action="{{url('add_interviewer/'.$m->id)}}" onsubmit="show()">
                @csrf
                <input type="hidden" name="mrf_id" value="{{$m->id}}">
                
                <div class="modal-body">
                    <button type="button" class="btn btn-sm btn-success" onclick="add_interviewer({{$m->id}})">
                        <i class="uil-plus"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_interviewer({{$m->id}})">
                        <i class="uil-minus"></i>
                    </button>
                    
                    <div class="interviewer-container-{{$m->id}} mt-3">
                        {{-- <div class="col-md-1">
                            <small>1</small>
                        </div>
                        <div class="col-md-11 mb-3">
                            <select name="interviewer[]" class="form-control cat">
                                <option value="">- Interviewer -</option>
                                @foreach ($user->whereIn('role', ['Department Head', 'Human Resources']) as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        @if($m->interviewer->isNotEmpty())
                            @foreach ($m->interviewer as $i)
                            <div class="row" id="interviewer_{{$m->id}}_{{$i->level}}">
                                <div class="col-md-1">
                                    <small>{{$i->level}}</small>
                                </div>
                                <div class="col-md-11 mb-3">
                                    <select name="interviewer[]" class="form-control cat">
                                        <option value="">- Interviewer -</option>
                                        @foreach ($user->whereIn('role', ['Department Head', 'Human Resources']) as $u)
                                        <option value="{{$u->id}}" @if($u->id == $i->user_id) selected @endif>{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="interviewer{{$applicant->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Interviewer</h5>
            </div>
            <form method="POST" action="{{url('add_interviewer/'.$applicant->id)}}" onsubmit="show()">
                @csrf
                
                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                <input type="hidden" name="mrf_id" value="{{$applicant->mrf->id}}">
                
                <div class="modal-body">
                    <button type="button" class="btn btn-sm btn-success" onclick="add_interviewer({{$applicant->id}})">
                        <i class="uil-plus"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="delete_interviewer({{$applicant->id}})">
                        <i class="uil-minus"></i>
                    </button>
                    
                    <div class="interviewer-container-{{$applicant->id}} mt-3">
                        @if($applicant->interviewers->isNotEmpty())
                            @foreach ($applicant->interviewers as $key=>$i)
                            <div class="row" id="interviewer_{{$applicant->id}}_{{$key+1}}">
                                <div class="col-md-1">
                                    <small>{{$key+1}}</small>
                                </div>
                                <div class="col-md-11 mb-3">
                                    <select name="interviewer[]" class="form-control cat" @if($i->status == 'Passed') disabled @endif>
                                        <option value="">- Interviewer -</option>
                                        @foreach ($interviewers->whereIn('role', ['Department Head', 'Human Resources', 'Head Business Unit', 'Human Resources Manager']) as $interviewer)
                                        <option value="{{$interviewer->id}}" @if($interviewer->id == $i->user_id) selected @endif>{{$interviewer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="row" id="interviewer_{{$applicant->id}}_1">
                            <div class="col-md-1">
                                <small>1</small>
                            </div>
                            <div class="col-md-11 mb-3">
                                <select name="interviewer[]" class="form-control cat">
                                    <option value="">- Interviewer -</option>
                                    @foreach ($interviewers->whereIn('role', ['Department Head', 'Human Resources', 'Head Business Unit', 'Human Resources Manager']) as $interviewer)
                                    <option value="{{$interviewer->id}}" @if($interviewer->id == $applicant->mrf->recruiter->id) selected @endif>{{$interviewer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
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

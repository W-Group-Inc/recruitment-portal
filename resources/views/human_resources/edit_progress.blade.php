<div class="modal" id="editProgress{{$m->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Progress</h5>
            </div>
            <form method="POST" action="{{url('update-progress/'.$m->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            Progress
                            <select name="progress" class="form-control cat" required>
                                <option value="">Select Progress</option>
                                <option value="Open" @if($m->progress == 'Open') selected @endif>Open</option>
                                <option value="Serve" @if($m->progress == 'Serve') selected @endif>Serve</option>
                                <option value="Hold" @if($m->progress == 'Hold') selected @endif>Hold</option>
                                <option value="Cancelled" @if($m->progress == 'Cancelled') selected @endif>Cancelled</option>
                                <option value="Reject" @if($m->progress == 'Reject') selected @endif>Reject</option>
                            </select>
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
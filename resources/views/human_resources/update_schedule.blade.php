<div class="modal" id="schedule{{$sched->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Schedule Interview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('update-schedule/'.$sched->id)}}" onsubmit="show()" >
                @csrf 

                <input type="hidden" name="email" value="{{$applicant->email}}">
                <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Event Name</label>
                            <input type="text" name="event_name" class="form-control form-control-sm" value="{{$sched->schedule_name}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">Start Date Time</label>
                            <input type="datetime-local" name="start_time" class="form-control form-control-sm" value="{{$sched->start_datetime}}" min="{{date('Y-m-d h:i')}}" required>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label">End Date Time</label>
                            <input type="datetime-local" name="end_time" class="form-control form-control-sm" value="{{$sched->end_datetime}}" min="{{date('Y-m-d h:i')}}" required>
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
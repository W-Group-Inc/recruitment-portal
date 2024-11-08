<div class="modal" id="reviewer{{$m->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Review MRF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('assign-recruiter/'.$m->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    Assign Reviewer
                    <select name="reviewer" class="form-control cat" required>
                        <option value="">Select recruiter</option>
                        @foreach ($reviewer as $review)
                            <option value="{{$review->id}}">{{$review->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
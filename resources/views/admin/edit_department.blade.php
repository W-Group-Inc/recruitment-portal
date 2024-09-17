<div class="modal" id="edit{{$department->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('update_department/'.$department->id)}}" onsubmit="show()">
                @csrf 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Company :
                            <select class="form-control select2" name="company" data-toggle="select2" required>
                                <option value="">-Company-</option>
                                @foreach ($company as $c)
                                    <option value="{{$c->id}}" @if($c->id == $department->company_id) selected @endif>{{$c->code .' - '.$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            Code :
                            <input type="text" name="code" class="form-control form-control-sm" value="{{$department->code}}" required>
                        </div>
                        <div class="col-md-12">
                            Name :
                            <input type="text" name="name" class="form-control form-control-sm" value="{{$department->name}}" required>
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
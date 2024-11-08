<div class="modal" id="view{{$jp->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Job Position</h5>
            </div>
            <div class="modal-body">
                <div class="card rounded-0 border border-1 border-primary">
                    <div class="card-header bg-primary text-white fw-bold rounded-0">
                        <p class="mb-0">Job Position</p>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-lg-4">
                                Position Summary :
                            </dt>
                            <dd class="col-lg-8">
                                {!! nl2br($jp->position_summary) !!}
                            </dd>
                            <hr>
                            <dt class="col-lg-4">
                                Duties and Responsibility :
                            </dt>
                            <dd class="col-lg-8">
                                {!! nl2br($jp->duties_and_responsibility) !!}
                            </dd>
                            <hr>
                            <dt class="col-lg-4">
                                Approval Authority :
                            </dt>
                            <dd class="col-lg-8">
                                {!! nl2br($jp->approval_authority) !!}
                            </dd>
                            <hr>
                            <dt class="col-lg-4">
                                Minimum Requirements :
                            </dt>
                            <dd class="col-lg-8">
                                {!! nl2br($jp->minimum_requirements) !!}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
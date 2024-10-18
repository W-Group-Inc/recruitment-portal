@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
    <div class="col-lg-12">
        <h4 class="header-title">Job Position</h4>
        <div class="card">
            <div class="card-body">
                <button class="btn btn-sm btn-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#new">
                    <i class="uil-plus"></i>
                    Add Job Position
                </button>

                <div class="table-responsive">
                    <table class="table table-bordered" id="alternative-page-datatable">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Position Summary</th>
                                <th>Duties and Responsibility</th>
                                <th>Approval Authority</th>
                                <th>Minimum Requirements</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($job_position as $jp)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning">
                                            <i class="dripicons-pencil"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-danger">
                                            <i class="uil-trash"></i>
                                        </button>
                                    </td>
                                    <td>{{$jp->company->name}}</td>
                                    <td>{{$jp->department->name}}</td>
                                    <td>{{$jp->position}}</td>
                                    <td>{!! nl2br($jp->position_summary) !!}</td>
                                    <td>{!! nl2br($jp->duties_and_responsibility) !!}</td>
                                    <td>{!! nl2br($jp->approval_authority) !!}</td>
                                    <td>{!! nl2br($jp->minimum_requirements) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('human_resources.new_job_position')

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.cat').chosen({width: "100%"})

        // $('.delete-btn').on('click', function() {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         // text: "This department is active",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $(this).closest('form').submit();
        //         }
        //     });
        // })
    })
</script>
@endsection
@endsection
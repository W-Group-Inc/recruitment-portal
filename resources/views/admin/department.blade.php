@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')

<div class="row">
    <h5 class="header-title">Company</h5>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('components.error')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-success btn-sm" data-bs-toggle='modal' data-bs-target="#add">
                            <i class="dripicons-plus"></i>
                            New Department
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table dt-responsive nowrap table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Company</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Department Head</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$department->id}}">
                                            <i class="dripicons-document-edit"></i>
                                        </button>

                                        @if($department->status == "Active")
                                        <form method="POST" action="{{url('deactivate-department/'.$department->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger deactivate">
                                                <i class="uil-ban"></i>
                                            </button>
                                        </form>
                                        @elseif($department->status == "Inactive")
                                        <form method="POST" action="{{url('activate-department/'.$department->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-info activate">
                                                <i class="uil-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>{{optional($department->company)->name}}</td>
                                    <td>{{$department->code}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>{{optional($department->head)->name}}</td>
                                    <td>
                                        @if($department->status == "Active")
                                        <span class="badge bg-success">
                                        @elseif($department->status == "Inactive")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$department->status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('admin.edit_department')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@include('admin.new_department')
@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.cat').chosen({width:"100%"})

    $('.deactivate').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "This department is deactivate",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, deactivate it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    })

    $('.activate').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "This department is active",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, activate it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    })
});
</script>
@endsection
@endsection
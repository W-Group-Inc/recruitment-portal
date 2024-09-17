@extends('layouts.app')
@section('css')

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
                            New Company
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table dt-responsive nowrap table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$company->id}}">
                                            <i class="dripicons-document-edit"></i>
                                        </button>

                                        @if($company->status == "Active")
                                        <form method="POST" action="{{url('deactivate-company/'.$company->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger deactivate">
                                                <i class="uil-ban"></i>
                                            </button>
                                        </form>
                                        @elseif($company->status == "Inactive")
                                        <form method="POST" action="{{url('activate-company/'.$company->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-info activate">
                                                <i class="uil-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>{{$company->code}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>
                                        @if($company->status == "Active")
                                        <span class="badge bg-success">
                                        @elseif($company->status == "Inactive")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$company->status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('admin.edit_company')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@include('admin.new_company')
@section('js')
<script>
$(document).ready(function() {
    $('.deactivate').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "This company is deactivate",
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
            text: "This company is active",
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
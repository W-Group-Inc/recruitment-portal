@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')

<div class="row">
    <h5 class="header-title">Users</h5>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('components.error')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-success btn-sm" data-bs-toggle='modal' data-bs-target="#addModal">
                            <i class="dripicons-plus"></i>
                            New User
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table dt-responsive nowrap table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Prefix</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">
                                            <i class="dripicons-document-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#password{{$user->id}}">
                                            <i class="uil-unlock"></i>
                                        </button>

                                        @if($user->status == "Active")
                                        <form method="POST" action="{{url('deactivate/'.$user->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger deactivate">
                                                <i class="uil-ban"></i>
                                            </button>
                                        </form>
                                        @elseif($user->status == "Inactive")
                                        <form method="POST" action="{{url('activate/'.$user->id)}}" class="d-inline-block" onsubmit="show()">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-info activate">
                                                <i class="uil-check"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>{{$user->prefix}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->company->name}}</td>
                                    <td>{{$user->department->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        @if($user->status == "Active")
                                        <span class="badge bg-success">
                                        @elseif($user->status == "Inactive")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$user->status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('admin.edit_user')
                                @include('admin.change_password')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@include('admin.new_user')
@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.cat').chosen({width:"100%"})

    $('.deactivate').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "This account is deactivate",
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
            text: "This account is active",
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

    $('.select2').select2({
        dropdownParent: $('.modal')
    })
});
</script>
@endsection
@endsection
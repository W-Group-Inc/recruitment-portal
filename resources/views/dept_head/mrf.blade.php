@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')

<div class="row">
    <h5 class="header-title">Manpower Requisition Form</h5>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('components.error')
                <div class="row mb-3">
                    <div class="col-md-4">
                        @if(auth()->user()->role == "Department Head")
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="dripicons-plus"></i>
                            New MRF
                        </button>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Date Requested</th>
                                <th>MRF #</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Approver Status</th>
                                <th>Status</th>
                                @if(auth()->user()->role == 'Human Resources')
                                <th>Progress</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(auth()->user()->role == "Department Head")
                            @foreach ($mrf->where('department_id', auth()->user()->department_id) as $m)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$m->id}}" @if($m->mrf_status == "Approved") disabled @endif>
                                            <i class="dripicons-document-edit"></i>
                                        </button>

                                        <form action="{{url('delete-mrf/'.$m->id)}}" method="post" class="d-inline-block">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger delete-btn" @if($m->mrf_status == "Approved") disabled @endif>
                                                <i class="uil-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$m->jobPosition->position}}</td>
                                    <td>{{$m->company->name}}</td>
                                    <td>{{$m->department->name}}</td>
                                    <td>
                                        @foreach ($m->mrfApprovers as $ma)
                                            <small>{{$ma->user->name}} - 
                                                @if($ma->status == 'Pending')
                                                <span class="badge bg-warning"> 
                                                @elseif($ma->status == 'Approved')
                                                <span class="badge bg-success">
                                                @else
                                                <span class="badge bg-info">
                                                @endif
                                                    {{$ma->status}} 
                                                </span> 
                                                </small>
                                                <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        <span class="badge bg-success">
                                        @elseif($m->mrf_status == "Pending")
                                        <span class="badge bg-warning">
                                        @elseif($m->mrf_status == "Returned")
                                        <span class="badge bg-info">
                                        @elseif($m->mrf_status == "Rejected")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('dept_head.edit_mrf')
                            @endforeach
                            @endif

                            @if(auth()->user()->role == "Human Resources" || auth()->user()->role == "Human Resources Manager")
                            @foreach ($mrf as $key=>$m)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProgress{{$m->id}}">
                                            <i class="dripicons-pencil"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#view{{$m->id}}">
                                            <i class="uil-eye"></i>
                                        </button>
                                    </td>
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$m->jobPosition->position}}</td>
                                    <td>{{$m->company->name}}</td>
                                    <td>{{$m->department->name}}</td>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        <span class="badge bg-success">
                                        @elseif($m->mrf_status == "Pending")
                                        <span class="badge bg-warning">
                                        @elseif($m->mrf_status == "Returned")
                                        <span class="badge bg-info">
                                        @elseif($m->mrf_status == "Rejected")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                    <td>
                                        @foreach ($m->mrfApprovers as $ma)
                                            <small>{{$ma->user->name}} - 
                                                @if($ma->status == 'Pending')
                                                <span class="badge bg-warning"> 
                                                @elseif($ma->status == 'Approved')
                                                <span class="badge bg-success">
                                                @elseif($ma->status == 'Rejected')
                                                <span class="badge bg-danger">
                                                @else
                                                <span class="badge bg-info">
                                                @endif
                                                    {{$ma->status}} 
                                                </span> 
                                            </small>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($m->progress == "Open")
                                        <span class="badge bg-success">
                                        @elseif($m->progress == "Serve")
                                        <span class="badge bg-success">
                                        @elseif($m->progress == "Hold")
                                        <span class="badge bg-warning">
                                        @elseif($m->progress == "Cancelled")
                                        <span class="badge bg-danger">
                                        @elseif($m->progress == "Reject")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->progress}}
                                        </span>
                                    </td>
                                </tr>

                                @include('human_resources.edit_progress')
                                @include('human_resources.view_mrf')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@if(auth()->user()->role == 'Department Head')
@include('dept_head.new_mrf')
@endif

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.position_status').on('change', function() {

            if($(this).val() == "Replacement")
            {
                $('.replacementOf').css("display", "block")
            }
            else
            {
                $('.replacementOf').css("display", "none")
            }
        })
        
        $('.cat').chosen({width: "100%"})

        $('.delete-btn').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                // text: "This department is active",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        })

        $('.post-to-indeed').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "If you submit this it will automatically post to indeed.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approved it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
            });
        })
    })
</script>
@endsection
@endsection
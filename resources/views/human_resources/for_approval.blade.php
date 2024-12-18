@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-xxl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">For Approval MRF</h5>
                        <h3 class="my-2 py-1">{{count($mrf_list)}}</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

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
                    <table id="alternative-page-datatable" class="table dt-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Date Requested</th>
                                <th>MRF #</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Recruiter</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mrf_list as $m)
                                {{-- @php
                                    $m = $approver->mrf;
                                @endphp --}}
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#view{{$m->id}}">
                                            <i class="uil-eye"></i>
                                        </button>

                                        <a href="{{url('print-mrf/'.$m->id)}}" class="btn btn-sm btn-danger" target="_blank">
                                            <i class="dripicons-print"></i>
                                        </a>

                                        {{-- <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#recruiter{{$m->id}}">
                                            <i class="dripicons-document-edit"></i>
                                        </button> --}}

                                        {{-- <form action="{{url('delete-mrf/'.$m->id)}}" method="post" class="d-inline-block">
                                            @csrf

                                            <button type="button" class="btn btn-sm btn-danger delete-btn">
                                                <i class="uil-trash"></i>
                                            </button>
                                        </form> --}}
                                    </td>
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{$m->jobPosition->position}}</td>
                                    <td>{{$m->company->name}}</td>
                                    <td>{{$m->department->name}}</td>
                                    <td>{{optional($m->recruiter)->name}}</td>
                                    <td>
                                        @if($m->mrf_status == "Approved")
                                        <span class="badge bg-success">
                                        @elseif($m->mrf_status == "Pending")
                                        <span class="badge bg-warning">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                </tr>

                                @include('human_resources.view_for_approval')
                                @include('human_resources.assign_recruiter')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


{{-- @include('dept_head.new_mrf') --}}

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
    function assignRecruiter(value,id)
    {
        if (value == "Approved")
        {
            $("#assignRecruiterCol"+id).css('display','block');
            $("#assignRecruiter"+id).prop('required', true);
            $("#remarks"+id).prop('required', false);
        }
        else
        {
            $("#assignRecruiterCol"+id).css('display','none');
            $("#assignRecruiter"+id).prop('required', false);
            $("#remarks"+id).prop('required', true);
        }
    }

    $(document).ready(function() {
        // $('.select2').select2({
        //     dropdownParent: $('.modal')
        // })

        $('.cat').chosen({width:"100%"})
    })
</script>
@endsection
@endsection
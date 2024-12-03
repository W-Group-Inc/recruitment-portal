@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">Total MRF</h5>
                        <h3 class="my-2 py-1">{{count($mrf_list)}}</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">Total Approved</h5>
                        <h3 class="my-2 py-1">{{count($mrf_list->where('mrf_status','Approved'))}}</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">Total Pending</h5>
                        <h3 class="my-2 py-1">{{count($mrf_list->where('mrf_status','Pending'))}}</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">Total Rejected</h5>
                        <h3 class="my-2 py-1">{{count($mrf_list->where('mrf_status','Rejected'))}}</h3>
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
                        @if(auth()->user()->role == "Department Head" || auth()->user()->role == 'Human Resources Manager')
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mrf_list as $m)
                                <tr>
                                    <td>{{date('M d, Y', strtotime($m->created_at))}}</td>
                                    <td>MRF-{{str_pad($m->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                    <td>{{optional($m->jobPosition)->position}}</td>
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
                                        @elseif($m->mrf_status == "Cancelled")
                                        <span class="badge bg-danger">
                                        @endif  

                                        {{$m->mrf_status}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
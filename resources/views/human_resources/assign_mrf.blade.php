@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-xxl-3">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="text-muted fw-normal mt-0 text-truncate">Assigned MRF</h5>
                        <h3 class="my-2 py-1">{{count($assign_mrf)}}</h3>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        <h5 class="header-title">Assigned MRF</h5>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('components.error')
                    <div class="table-responsive">
                        <table id="alternative-page-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Date Requested</th>
                                    <th>Date Approved</th>
                                    <th>MRF #</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    {{-- <th>Assign Recruiter</th> --}}
                                    {{-- <th>Status</th>
                                    <th>Progress</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assign_mrf as $mrf)
                                    <tr>
                                        <td>
                                            <a href="{{url($mrf->mrf_file)}}" class="btn btn-sm btn-info" target="_blank" title="View file">
                                                <i class="uil-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{date('M d, Y', strtotime($mrf->created_at))}}</td>
                                        <td>
                                            @if($mrf->mrf_status == 'Approved')
                                                {{date('M d, Y', strtotime($mrf->updated_at))}}
                                            @endif
                                        </td>
                                        <td>MRF-{{str_pad($mrf->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                        <td>{{$mrf->jobPosition->position}}</td>
                                        <td>{{$mrf->company->name}}</td>
                                        <td>{{$mrf->department->name}}</td>
                                        {{-- <td>{{$mrf->recruiter->name}}</td> --}}
                                        {{-- <td>
                                            @if($mrf->mrf_status == "Approved")
                                            <span class="badge bg-success">
                                            @elseif($mrf->mrf_status == "Pending")
                                            <span class="badge bg-warning">
                                            @elseif($mrf->mrf_status == "Returned")
                                            <span class="badge bg-info">
                                            @elseif($mrf->mrf_status == "Rejected")
                                            <span class="badge bg-danger">
                                            @elseif($mrf->mrf_status == "Cancelled")
                                            <span class="badge bg-danger">
                                            @endif  

                                            {{$mrf->mrf_status}}
                                            </span>
                                        </td>
                                        <td>
                                            @if($mrf->progress == "Open")
                                            <span class="badge bg-success">
                                            @elseif($mrf->progress == "Served")
                                            <span class="badge bg-success">
                                            @elseif($mrf->progress == "Hold")
                                            <span class="badge bg-warning">
                                            @elseif($mrf->progress == "Cancelled")
                                            <span class="badge bg-danger">
                                            @elseif($mrf->progress == "Reject")
                                            <span class="badge bg-danger">
                                            @endif  

                                            {{$mrf->progress}}
                                            </span>
                                        </td> --}}
                                    </tr>

                                    {{-- @include('human_resources.upload_approved_mrf') --}}
                                    {{-- @include('human_resources.assigned') --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection
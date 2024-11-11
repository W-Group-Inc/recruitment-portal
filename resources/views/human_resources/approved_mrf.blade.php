@extends('layouts.app')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection

@section('content')
<div class="col-lg-12">
    <div class="row">
        <h5 class="header-title">Approved MRF</h5>
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
                                    <th>MRF #</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Assign Recruiter</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approved_mrf as $mrf)
                                    <tr>
                                        <td>
                                            <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#upload{{$mrf->id}}">
                                                <i class="uil-upload"></i>
                                            </button>

                                            @if(!empty($mrf->mrf_file))
                                                <a href="{{url($mrf->mrf_file)}}" class="btn btn-sm btn-info" target="_blank" title="View file">
                                                    <i class="uil-eye"></i>
                                                </a>
                                            @endif

                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#recruiter{{$mrf->id}}">
                                                <i class="dripicons-document-edit"></i>
                                            </button>
                                        </td>
                                        <td>{{date('M d, Y', strtotime($mrf->created_at))}}</td>
                                        <td>MRF-{{str_pad($mrf->mrf_no, 4, '0', STR_PAD_LEFT)}}</td>
                                        <td>{{$mrf->jobPosition->position}}</td>
                                        <td>{{$mrf->company->name}}</td>
                                        <td>{{$mrf->department->name}}</td>
                                        <td>{{$mrf->recruiter->name}}</td>
                                        <td>
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
                                            @elseif($mrf->progress == "Serve")
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
                                        </td>
                                    </tr>

                                    @include('human_resources.upload_approved_mrf')
                                    @include('human_resources.assigned')
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

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.cat').chosen({width:"100%"})
    })
</script>
@endsection
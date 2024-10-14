@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
@endsection
@section('content')
    <div class="row">
        <h4 class="header-title">Applicants</h4>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('components.error')
                    
                    @if(auth()->user()->role == "Human Resources")
                    <button class="mb-3 btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="uil-plus"></i>
                        Add Applicant
                    </button>
                    @endif

                    <div class="table-responsive">
                        <table id="alternative-page-datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->user()->role == "Human Resources")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            @if(count($applicant->mrf->interviewer) > 0)
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank" title="View Applicant">
                                                <i class="uil-eye"></i>
                                            </a>    
                                            @endif
                                            
                                            @if($applicant->applicant_status == "Pending")
                                            <button type="button" class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#edit{{$applicant->id}}">
                                                <i class="dripicons-pencil"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>{{$applicant->name}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mobile_number}}</td>
                                        <td>{{$applicant->mrf->position_title}}</td>    
                                        <td>
                                            @if($applicant->applicant_status == "Pending")
                                            <span class="badge bg-warning">
                                            @elseif($applicant->applicant_status == "Passed")
                                            <span class="badge bg-success">
                                            @elseif($applicant->applicant_status == "Failed")
                                            <span class="badge bg-danger">
                                            @endif
                                                {{$applicant->applicant_status}}
                                            </span>
                                        </td>
                                    </tr>

                                    @include('human_resources.edit_applicant')
                                @endforeach
                                @endif

                                @if(auth()->user()->role == "Department Head")
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank">
                                                <i class="uil-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{$applicant->name}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mobile_number}}</td>
                                        <td>{{$applicant->mrf->position_title}}</td>
                                        <td>
                                            @if($applicant->applicant_status == "Pending")
                                            <span class="badge bg-warning">
                                            @elseif($applicant->applicant_status == "Passed")
                                            <span class="badge bg-success">
                                            @elseif($applicant->applicant_status == "Failed")
                                            <span class="badge bg-danger">
                                            @endif
                                                {{$applicant->applicant_status}}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>

@include('human_resources.new_applicant')
@endsection

@section('js')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.cat').chosen({width:"100%"})
    })
</script>
@endsection
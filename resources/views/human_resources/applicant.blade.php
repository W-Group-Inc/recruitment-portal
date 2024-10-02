@extends('layouts.app')

@section('content')
    <div class="row">
        <h4 class="header-title">Applicants</h4>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('components.error')
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
                                            <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank">
                                                <i class="uil-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{$applicant->name}}</td>
                                        <td>{{$applicant->email}}</td>
                                        <td>{{$applicant->mobile_number}}</td>
                                        <td>{{$applicant->position}}</td>
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
                                        <td>{{$applicant->position}}</td>
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
@endsection
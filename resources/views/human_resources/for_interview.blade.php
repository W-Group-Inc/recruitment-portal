@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="alternative-page-datatable">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Applicant</th>
                                <th>Position</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interviewers as $interviewer)
                                @php
                                    $applicant = $interviewer->applicant;
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{url('view-applicant/'.$applicant->id)}}" class="btn btn-sm btn-info" target="_blank" title="View Applicant">
                                            <i class="uil-eye"></i>
                                        </a> 
                                    </td>
                                    <td>
                                        {{$applicant->lastname.', '.$applicant->firstname.' '.$applicant->middlename}}
                                    </td>
                                    <td>
                                        {{$applicant->mrf->jobPosition->position}}
                                    </td>
                                    <td>
                                        @if($applicant->applicant_status == 'Passed')
                                        <span class="badge bg-success">
                                        @elseif($applicant->applicant_status == 'Pending')
                                        <span class="badge bg-warning">
                                        @elseif($applicant->applicant_status == 'Failed')
                                        <span class="badge bg-danger">
                                        @endif
                                            {{$applicant->applicant_status}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
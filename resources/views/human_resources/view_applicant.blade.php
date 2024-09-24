@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{asset('img/user.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-2 mt-2">{{$applicant->name}}</h4>
                <button type="button" class="btn btn-danger btn-sm mb-2">Fail</button>
                <button type="button" class="btn btn-success btn-sm mb-2">Pass</button>
                <a href="{{url('print-jo/'.$applicant->id)}}" type="button" class="btn btn-primary btn-sm mb-2" target="_blank">Job Offer</a>
                <button type="button" class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#schedule">Schedule Interview</button>

                <hr>
                <div class="text-start mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Position Applied :</strong> <span class="ms-2">{{$applicant->position}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Email:</strong> <span class="ms-2">{{$applicant->email}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$applicant->mobile_number}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                        @if($applicant->applicant_status == "Pending")
                        <span class="ms-2 badge bg-warning">{{$applicant->applicant_status}}</span>
                        @elseif($applicant->applicant_status == "Approved")
                        <span class="ms-2 badge bg-success">{{$applicant->applicant_status}}</span>
                        @elseif($applicant->applicant_status == "Failed")
                        <span class="ms-2 badge bg-danger">{{$applicant->applicant_status}}</span>
                        @endif
                    </span></p>
                    <p class="text-muted mb-2 font-13"><strong>Date Applied :</strong><span class="ms-2">{{date('M d, Y', strtotime($applicant->created_at))}}</span></p>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col-->

    <div class="col-lg-4 ">
        <div class="card">
            <div class="card-body">
                <h3 class="fs-3"><i class="uil-calendar-alt me-2"></i>Schedule</h3>
                <hr>

                <div class="row">
                    <div class="col-lg-4"><b>Date</b></div>
                    <div class="col-lg-4"><b>Time</b></div>
                    <div class="col-lg-4"><b>Name</b></div>
                    @foreach ($applicant->schedule as $sched)
                        <div class="col-lg-4">
                            {{date('M d, Y', strtotime($sched->date_time))}}
                        </div>
                        <div class="col-lg-4">
                            {{date('h:i A', strtotime($sched->date_time))}}
                        </div>
                        <div class="col-lg-4 mb-2">
                            {{$sched->schedule_name}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">History</span>
                        </a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane show active" id="home">
                        <div class="table-responsive">
                            <table id="alternative-page-datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Date Applied</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@include('human_resources.schedule_interview')
@endsection
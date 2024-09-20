@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{asset('img/user.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-0 mt-2">{{$applicant->name}}</h4>
                <p class="text-muted font-14">{{$applicant->position}}</p>

                <button type="button" class="btn btn-danger btn-sm mb-2">Fail</button>
                <button type="button" class="btn btn-success btn-sm mb-2">Pass</button>
                <a href="javascript:void(0)" type="button" class="btn btn-primary btn-sm mb-2">Job Offer</a>
                <hr>
                <div class="text-start mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Email:</strong> <span class="ms-2">{{$applicant->email}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$applicant->mobile_number}}</span></p>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
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
@endsection
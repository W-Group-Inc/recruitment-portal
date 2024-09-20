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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
@endsection
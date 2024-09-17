@extends('layouts.app')
@section('css')
    
@endsection

@section('content')

<div class="row">
    <h5 class="header-title">Users</h5>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-success btn-sm">
                            <i class="dripicons-plus"></i>
                            New User
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="alternative-page-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>  
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@section('js')
    
@endsection
@endsection
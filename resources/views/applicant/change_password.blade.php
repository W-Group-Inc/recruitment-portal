@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <h4 class="header-title">Change Password</h4>
        <div class="card w-50 mx-auto">
            @include('components.error')
            @if(auth()->user()->role == 'Applicant' && auth()->user()->is_login == null)
            <div class="alert alert-info mb-2">
                Before you proceed, please change your password
            </div>
            @endif
            <div class="card-header" style="vertical-align: middle;">
                <p class="h5">Change Password</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('change-password/'.auth()->user()->id)}}" onsubmit="show()">
                    @csrf
                    
                    <input type="hidden" name="route" value="{{Route::current()->uri()}}">
                    <input type="hidden" name="is_login" value="1">

                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            New Password
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            Confirmation Password
                            <input type="password" name="password_confirmation" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
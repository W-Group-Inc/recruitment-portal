@extends('layouts.app')

@section('content')
<div class="row">
    @if(auth()->user()->role == "Administrator")
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($user)}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class=" uil-sitemap text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($department)}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Departments</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="uil-building text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($company)}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Companies</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title mb-4">Users</h5>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="users" data-colors="#5cb85c,#d9534f" style="height: 320px;"></canvas>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    @endif

    @if(auth()->user()->role == "Department Head")
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class=" uil-thumbs-up text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status', 'Approved'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Approved MRF</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="dripicons-clock text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status', 'Pending'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Pending MRF</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="uil-thumbs-down text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status','Rejected'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Rejected MRF</p>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user()->role == "Human Resources")
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class=" uil-thumbs-up text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status', 'Approved'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Approved MRF</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="dripicons-clock text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status', 'Pending'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total For Approval MRF</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="uil-thumbs-down text-muted" style="font-size: 24px;"></i>
                <h3><span>{{count($mrf->where('mrf_status','Rejected'))}}</span></h3>
                <p class="text-muted font-15 mb-0">Total Rejected MRF</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title mb-4">Applicants</h5>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="applicant" data-colors="#ffbc00,#0acf97,#fa5c7c" style="height: 320px;"></canvas>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    @endif
</div>
@endsection

@section('js')
<!-- third party js -->
<script src="{{asset('assets/js/vendor/Chart.bundle.min.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('assets/js/pages/demo.chartjs.js')}}"></script>

@if(auth()->user()->role == "Administrator")
<script>
    $(document).ready(function() {
        var ctx = document.getElementById('users');
        var chartColors = ctx.getAttribute('data-colors').split(',');

        var active_user = {!! json_encode(count($user->where('status', 'Active'))) !!}
        var inactive_user = {!! json_encode(count($user->where('status', 'Inactive'))) !!}

        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    data: [
                        active_user,
                        inactive_user
                    ],
                    backgroundColor: chartColors, 
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                // cutout: '80%',  // Adjust the size of the cutout for the donut effect
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    })
</script>
@endif

@if(auth()->user()->role == "Human Resources")
<script>
    var ctx = document.getElementById('applicant');
    var chartColors = ctx.getAttribute('data-colors').split(',');

    var pending_applicant = {!! json_encode(count($applicant->where('applicant_status','Pending'))) !!}
    var passed_applicant = {!! json_encode(count($applicant->where('applicant_status','Passed'))) !!}
    var failed_applicant = {!! json_encode(count($applicant->where('applicant_status','Failed'))) !!}

    var donutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Pending Applicants', 'Total Approved Applicants', 'Total Failed Applicants'],
            datasets: [{
                data: [
                    pending_applicant,
                    passed_applicant,
                    failed_applicant
                ],
                backgroundColor: chartColors, 
                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            // cutout: '80%',  // Adjust the size of the cutout for the donut effect
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endif

@endsection
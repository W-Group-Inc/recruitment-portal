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
        <div class="col-md-12">

        </div>
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

    @if(auth()->user()->role == "Human Resources" || auth()->user()->role == 'Human Resources Manager')
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="header-title">MRF Status in year {{date('Y')}}</h4> --}}
                    <div dir="ltr">
                        <div id="basic-column" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">MRF Status</h5>

                    <div class="table-responsive">
                        <table class="table tables table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Progress</th>
                                    <th>MRF Received</th>
                                    <th>Date Served</th>
                                    <th>Running Days</th>
                                    <th>Within TAT</th>
                                    <th>Easy or Critical</th>
                                    <th>Company</th>
                                    <th>Report</th>
                                    <th>Hiring Manager</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Justification</th>
                                    <th>Status</th>
                                    <th>Salary Offer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mrf->where('mrf_status', '<>', 'Cancelled') as $m)
                                    <tr>
                                        <td>
                                            @if($m->progress == "Open")
                                            <span class="badge bg-success">
                                            @elseif($m->progress == "Served")
                                            <span class="badge bg-success">
                                            @elseif($m->progress == "Hold")
                                            <span class="badge bg-warning">
                                            @elseif($m->progress == "Cancelled")
                                            <span class="badge bg-danger">
                                            @elseif($m->progress == "Rejected")
                                            <span class="badge bg-danger">
                                            @endif  

                                            {{$m->progress}}
                                            </span>
                                        </td>
                                        <td>{{date('M. d, Y', strtotime($m->created_at))}}</td>
                                        <td>
                                            @if($m->progress == 'Served')
                                                {{date('M. d, Y', strtotime($m->updated_at))}}
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $date_today = new DateTime();
                                                $date_created = new DateTime($m->created_at);
                                                $running_days = $date_today->diff($date_created);
                                                $s = $running_days->d > 1 ? 's' : '';
                                            @endphp

                                            @if($m->progress == 'Open' && $m->mrf_status == 'Approved')
                                                @if($running_days->d > 0)
                                                    {{$running_days->d.' day'.$s}}
                                                @endif 
                                            @endif
                                        </td>
                                        <td>
                                            @if($m->job_level == 'Rank and File')
                                                30 days
                                            @elseif($m->job_level == 'Supervisory' || $m->job_level == 'Managerial')
                                                60 days
                                            @endif
                                        </td>
                                        <td>
                                            @if($m->job_level == 'Rank and File')
                                                <span class="badge bg-success">Easy</span>
                                            @elseif($m->job_level == 'Supervisory' || $m->job_level == 'Managerial')
                                                <span class="badge bg-danger">Critical</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$m->company->name}}
                                        </td>
                                        <td>
                                            <small>{{$m->company->address}}</small>
                                        </td>
                                        <td>
                                            {{$m->department->head->name}}
                                        </td>
                                        <td>
                                            {{$m->department->name}}
                                        </td>
                                        <td>
                                            {{optional($m->jobPosition)->position}}
                                        </td>
                                        <td>
                                            {!! nl2br($m->justification) !!}
                                        </td>
                                        <td>
                                            @if(count($m->interviewer->where('status', 'Pending')) > 0)
                                            <span class="badge bg-warning">For Interview</span>
                                            @elseif($m->progress == 'Served')
                                            <span class="badge bg-success">Served</span>
                                            @else
                                            <span class="badge bg-success">Sourcing</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$m->salary_range}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Applicant Tracking</h5>

                    <div class="table-responsive">
                        <table class="table tables table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Recruiter In Charge</th>
                                    <th>Candidate Name</th>
                                    <th>Date Sourced</th>
                                    <th>Date Screened</th>
                                    {{-- <th>Initial Screening Status</th> --}}
                                    <th>Source</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Resume</th>
                                    <th>Applicant Status</th>
                                    <th>Interview Schedule</th>
                                    <th>Interview Status</th>
                                    <th>Job Offer Date</th>
                                    <th>Start Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if(auth()->user()->role == 'Human Resources Manager')
                                    @foreach ($mrf->where('mrf_status', 'Approved') as $mrf_data)
                                        @foreach ($mrf_data->applicant as $applicant_data)
                                            <tr>
                                                <td>{{$applicant_data->mrf->jobPosition->position}}</td>
                                                <td>{{$applicant_data->mrf->recruiter->name}}</td>
                                                <td>{{optional($applicant_data->user)->name}}</td>
                                                <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                                <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                                <td>
                                                    @php
                                                        $name = "";
                                                        if ($applicant_data->source == 'Online Application')
                                                        {
                                                            $name = $applicant_data->application;
                                                        }
                                                        elseif($applicant_data->source == 'Employee Referral')
                                                        {
                                                            $name = $applicant_data->employee;
                                                        }
                                                    @endphp
                                                    {{$applicant_data->source.' - '.$name}} 
                                                </td>
                                                <td>{{$applicant_data->mobile_number}}</td>
                                                <td>{{$applicant_data->email}}</td>
                                                <td>
                                                    <a href="{{url($applicant_data->resume)}}" target="_blank">
                                                        <i class="uil-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($applicant_data->applicant_status == "Pending")
                                                        <span class="badge bg-warning">{{$applicant_data->applicant_status}}</span>
                                                    @elseif($applicant_data->applicant_status == "Passed")
                                                        <span class="badge bg-success">{{$applicant_data->applicant_status}}</span>
                                                    @elseif($applicant_data->applicant_status == "Failed")
                                                        <span class="badge bg-danger">{{$applicant_data->applicant_status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($applicant_data->schedule as $sched)
                                                        <small>
                                                            Name: {{$sched->schedule_name}} <br>
                                                            Date: {{date('M d Y', strtotime($sched->start_datetime))}} <br>
                                                            Start: {{date('g:i A', strtotime($sched->start_datetime))}} <br>
                                                            End: {{date('g:i A', strtotime($sched->end_datetime))}} <br>
                                                        </small>
                                                        <hr>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($applicant_data->interviewers as $int)
                                                        <small>{{$int->user->name}} - 
                                                            @if($int->status == 'Passed')
                                                            <span class="badge bg-success">
                                                            @elseif($int->status == 'Failed')
                                                            <span class="badge bg-danger">
                                                            @elseif($int->status == 'Pending')
                                                            <span class="badge bg-warning">
                                                            @elseif($int->status == 'Waiting')
                                                            <span class="badge bg-info">
                                                            @endif
                                                            
                                                            {{$int->status}}
                                                            </span>
                                                        </small> 
                                                        <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($applicant_data->jobOffer)
                                                        {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->updated_at))}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($applicant_data->jobOffer)
                                                        {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->start_date))}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach ($mrf->where('mrf_status', 'Approved')->where('recruiter_id', auth()->user()->id) as $mrf_data)
                                        @foreach ($mrf_data->applicant as $applicant_data)
                                            <tr>
                                                <td>{{$applicant_data->mrf->jobPosition->position}}</td>
                                                <td>{{$applicant_data->mrf->recruiter->name}}</td>
                                                <td>{{$applicant_data->user->name}}</td>
                                                <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                                <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                                <td>
                                                    @php
                                                        $name = "";
                                                        if ($applicant_data->source == 'Online Application')
                                                        {
                                                            $name = $applicant_data->application;
                                                        }
                                                        elseif($applicant_data->source == 'Employee Referral')
                                                        {
                                                            $name = $applicant_data->employee;
                                                        }
                                                    @endphp
                                                    {{$applicant_data->source.' - '.$name}} 
                                                </td>
                                                <td>{{$applicant_data->mobile_number}}</td>
                                                <td>{{$applicant_data->email}}</td>
                                                <td>
                                                    <a href="{{url($applicant_data->resume)}}" target="_blank">
                                                        <i class="uil-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($applicant_data->applicant_status == "Pending")
                                                        <span class="badge bg-warning">{{$applicant_data->applicant_status}}</span>
                                                    @elseif($applicant_data->applicant_status == "Passed")
                                                        <span class="badge bg-success">{{$applicant_data->applicant_status}}</span>
                                                    @elseif($applicant_data->applicant_status == "Failed")
                                                        <span class="badge bg-danger">{{$applicant_data->applicant_status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($applicant_data->jobOffer)
                                                        {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->updated_at))}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($applicant_data->jobOffer)
                                                        {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->start_date))}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif --}}
                                @foreach ($applicant as $applicant_data)
                                    <tr>
                                        <td>{{$applicant_data->mrf->jobPosition->position}}</td>
                                        <td>{{$applicant_data->mrf->recruiter->name}}</td>
                                        <td>{{$applicant_data->user->name}}</td>
                                        <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                        <td>{{date('M d, Y', strtotime($applicant_data->created_at))}}</td>
                                        <td>
                                            @php
                                                $name = "";
                                                if ($applicant_data->source == 'Online Application')
                                                {
                                                    $name = $applicant_data->application;
                                                }
                                                elseif($applicant_data->source == 'Employee Referral')
                                                {
                                                    $name = $applicant_data->employee;
                                                }
                                            @endphp
                                            {{$applicant_data->source.' - '.$name}} 
                                        </td>
                                        <td>{{$applicant_data->mobile_number}}</td>
                                        <td>{{$applicant_data->email}}</td>
                                        <td>
                                            <a href="{{url($applicant_data->resume)}}" target="_blank">
                                                <i class="uil-file"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if($applicant_data->applicant_status == "Pending")
                                                <span class="badge bg-warning">{{$applicant_data->applicant_status}}</span>
                                            @elseif($applicant_data->applicant_status == "Passed")
                                                <span class="badge bg-success">{{$applicant_data->applicant_status}}</span>
                                            @elseif($applicant_data->applicant_status == "Failed")
                                                <span class="badge bg-danger">{{$applicant_data->applicant_status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($applicant_data->schedule as $sched)
                                                <small>
                                                    Name: {{$sched->schedule_name}} <br>
                                                    Date: {{date('M d Y', strtotime($sched->start_datetime))}} <br>
                                                    Start: {{date('g:i A', strtotime($sched->start_datetime))}} <br>
                                                    End: {{date('g:i A', strtotime($sched->end_datetime))}} <br>
                                                </small>
                                                <hr>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($applicant_data->interviewers as $int)
                                                <small>{{$int->user->name}} - 
                                                    @if($int->status == 'Passed')
                                                    <span class="badge bg-success">
                                                    @elseif($int->status == 'Failed')
                                                    <span class="badge bg-danger">
                                                    @elseif($int->status == 'Pending')
                                                    <span class="badge bg-warning">
                                                    @elseif($int->status == 'Waiting')
                                                    <span class="badge bg-info">
                                                    @endif
                                                    
                                                    {{$int->status}}
                                                    </span>
                                                </small> 
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($applicant_data->jobOffer)
                                                {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->updated_at))}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($applicant_data->jobOffer)
                                                {{date('M. d Y', strtotime(optional($applicant_data->jobOffer)->start_date))}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->role == "Applicant")
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="h2">Welcome, {{auth()->user()->name}}</p>

                    <p class="h5" style="font-weight: normal;">Applicant Status:  <strong>{{auth()->user()->applicant->applicant_status}}</strong></p>
                    <p class="h5" style="font-weight: normal;">Position Applied:  <strong>{{auth()->user()->applicant->mrf->jobPosition->position}}</strong></p>
                </div>
            </div>
        </div>
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

@if(auth()->user()->role == "Human Resources" || auth()->user()->role == 'Human Resources Manager')
<script>
    $('.tables').DataTable({
        ordering:false,
        processing: false,
        serverSide:false,
        pageLength: 10
    })

    colors = ["#39afd1", "#ffbc00", "#0acf97", "#fa5c7c"];
    dataColors = $("#full-stacked-column").data("colors");
    if (dataColors) {
        colors = dataColors.split(",");
    }

    var months = {!! json_encode(collect($month)->pluck('m')->toArray()) !!}
    var total_mrf = {!! json_encode(collect($month)->pluck('total_mrf')->toArray()) !!}
    var open_mrf = {!! json_encode(collect($month)->pluck('open')->toArray()) !!}
    var serve_mrf = {!! json_encode(collect($month)->pluck('serve')->toArray()) !!}
    var reject_mrf = {!! json_encode(collect($month)->pluck('reject')->toArray()) !!}
    
    var options = {
        chart: {
            type: 'bar',
            height: 400
        },
        series: [
            { 
                name: "Total MRF", 
                data: total_mrf
            },
            { 
                name: "Open", 
                data: open_mrf
            },
            { 
                name: "Served", 
                data: serve_mrf
            },
            { 
                name: "Rejected", 
                data: reject_mrf
            }
        ],
        xaxis: {
            categories: months
        },
        title: {
            text: 'MRF Status in year {{date("Y")}}',
            align: 'center'
        },
        colors: colors
    };

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#basic-column"), options);
    chart.render();
</script>
@endif

@endsection
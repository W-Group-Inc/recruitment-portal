<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    @page {
        margin: 90px 50px 80px 50px;
    }

    html, body {
        margin-top: 20px;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .page-break {
        page-break-after: always;
    }

    table {
        page-break-inside: auto;
        width: 100%;
    }

    thead {
        display: table-row-group;
    }

    tr {
        page-break-inside: auto;
    }
    
    p {
        text-align: justify;
        text-justify: inter-word;
        font-size: 9;
    }

    header {
        position: fixed;
        /* top: -75px; */
        left: 0px;
        right: 0px;
        color: black;
        text-align: left;
        background-color: #ffffff;
    }

    .shade-box {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        padding: 3px;
        text-align: center;
        /* line-height: 110px; */
        font-family: Arial, sans-serif;
    }
</style>

<body>
    <header>
        <table cellpadding="0" cellspacing="0" style="width:100%; padding:0; margin:0;" border="1">
            <tr>
                <td rowspan="2" width="10">
                    <img style="height:60; padding:0; margin:0;" src="{{asset('img/wgroup.png')}}" alt="" >
                </td>
                <td>
                    <p class="ml-1">Form Number:</p>
                    <p class="text-center font-weight-bold mb-1">FR-HRD-003</p>
                </td>
                <td>
                    <p class="ml-1">Revision Number:</p>
                    <p class="text-center font-weight-bold mb-1">00</p>
                </td>
                <td>
                    <p class="ml-1">Effectivity Date:</p>
                    <p class="text-center font-weight-bold mb-1">May 2, 2019</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p class="ml-1">Form Title:</p>
                    <p class="text-center font-weight-bold mb-1">INTERVIEW ASSESSMENT</p>
                </td>
            </tr>
        </table>
    </header>
    
    <div class="page-break">

        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top:105;" border="1">
            <tr>
                <td width="90">
                    <p class="mb-0 ml-1">Name:</p>
                </td>
                <td width="190">
                    <p class="mb-0 ml-1">{{$interview_assessment->applicant->name}}</p>
                </td>
                <td>
                    <p class="mb-0 ml-1">Date Interviewed:</p>
                </td>
                <td>
                    <p class="mb-0 ml-1">{{date('M d, Y')}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="mb-0 ml-1">Position Applied For:</p>
                </td>
                <td>
                    <p class="mb-0 ml-1">{{$interview_assessment->applicant->mrf->position_title}}</p>
                </td>
                <td>
                    <p class="mb-0 ml-1">Department:</p>
                </td>
                <td>
                    <p class="mb-0 ml-1">{{$interview_assessment->applicant->mrf->department->name}}</p>
                </td>
            </tr>
        </table>

        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top:15;" border="1">
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold text-uppercase">I. Background</p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold">A. Personal Background:</p>
                </td>
            </tr>
            <tr>
                <td height="50">
                    <p class="mb-0 ml-1">{{$interview_assessment->personal_background}}</p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold">B. Qualification:</p>
                </td>
            </tr>
            <tr>
                <td height="120">
                    <p class="mb-0 ml-1">{{$interview_assessment->qualification}}</p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold">C. Reason for Transfer:</p>
                </td>
            </tr>
            <tr>
                <td height="30">
                    <p class="mb-0 ml-1">{{$interview_assessment->reason_for_transfer}}</p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold">D. Examination Results:</p>
                </td>
            </tr>
            <tr>
                <td height="30">
                    <p class="mb-0 ml-1">{{$interview_assessment->examination_result}}</p>
                </td>
            </tr>
            
        </table>

        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top:15;" border="1">
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold text-uppercase">II. HBU Assessment</p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Interviewer's Assessment</p>
                </td>
            </tr>
            <tr>
                <td height="30">
                    <p class="mb-0 ml-1">{{$interview_assessment->interview_assessment}}</p>
                </td>
            </tr>
        </table>

        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top:15;" border="1">
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold text-uppercase">III For Compensation purposes only</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="ml-1 mb-0"><strong>Salary Scale:</strong> {{$interview_assessment->salary_scale}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1"><strong>Salary Peers:</strong> {{$interview_assessment->salary_peers}}</p>
                </td>
            </tr>
            <tr>
                <td width="50">
                    <p class="mb-0 ml-1"><strong>Current Salary:</strong> {{$interview_assessment->current_salary}}</p>
                </td>
                <td width="50">
                    <p class="mb-0 ml-1"><strong>Expected Salary:</strong> {{$interview_assessment->expected_salary}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1"><strong>Recommendation by Human Resources:</strong> {{$interview_assessment->recommendation_by_human_resources}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1"><strong>Recommendation by Vice President / CEO / President:</strong> {{$interview_assessment->recommendation_hbu}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1"><strong>Negotiated Amount:</strong> {{$interview_assessment->negotiated_amount}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1"><strong>Remarks:</strong> {{$interview_assessment->remarks}}</p>
                </td>
            </tr>
        </table>
{{-- 
        <br>
        <br>
        <br>
        <br> --}}

        <div class="margin-top:140;">
            <p class="mb-0 text-uppercase font-weight-bold" style="font-size:10; margin-top:100;">Preliminary interview - hr assessment</p>
        </div>

        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 10;" border="1">
            <tr>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Interviewer's Name:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- @php
                            $hr_interviewer = $interview_assessment->applicant->mrf->interviewer->first();
                        @endphp

                        {{$hr_interviewer->user->name}} --}}
                    </p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Date:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- {{date('M d, Y')}} --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="4">
                    <p class="ml-1 mb-0 font-weight-bold text-uppercase">III For Compensation purposes only</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="p-3">
                    <table cellpadding='0' cellspacing='0' style="width:100%; padding:0;" border="1">
                        <tr>
                            <td></td>
                            <td>
                                <p class="mb-0 text-center">1</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">2</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">3</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">4</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Appearance</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->appearance == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Indifferent to attire and grooming sloppy, unkempt</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->appearance == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Careless attire, poor grooming</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->appearance == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Functional attire, neatly grommed</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->appearance == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Well groomed</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->appearance == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Immaculate attire and grooming</small></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Bearing</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->bearing == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>No bearing, lacks confidence, slovenly posture</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->bearing == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Often appears uncertain, poor posture</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->bearing == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Holds self well, seems confident</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->bearing == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Sure of self, reflects confidence</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->bearing == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Highly confident, inspires other, asserts presence</small></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Expression</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->expression == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Uncommunicative confused thoughts, poor vocabulary</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->expression == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Poor speaker, hazy thoughts</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->expression == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Speaks well, expressess ideas adequately</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->expression == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Speaks and thinks clearly with confidence</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->expression == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Exceptional speaks clearly and concisely with confidence, ideas well thought out</small></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Motivation</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->motivation == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>None, apathetic, indifferent, disinterested</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->motivation == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Doubtful interest in position</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->motivation == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Sincere desire to do work</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->motivation == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Strong interest in position, asks questions</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->motivation == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Highly motivated, eager to work, asks many questions</small></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Personality</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->personality == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Unpleasant</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->personality == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Slightly objectionable</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->personality == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Likeable</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->personality == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Pleasing</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->personality == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Extremely pleasing / charming</small></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="4">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Functional</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="p-3">
                    <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 10;" border="1">
                        <tr>
                            <td></td>
                            <td>
                                <p class="mb-0 text-center">1</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">2</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">3</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">4</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Job Knowledge</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->job_knowledge == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>None as pertains to this position</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->job_knowledge == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Will need considerable training</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->job_knowledge == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Basic but will learn on</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->job_knowledge == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Well versed in position, little training needed</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->job_knowledge == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Extremely well versed, able to work without further training</small></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Strengths</p>
                </td>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Areas for Improvement</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="80" width="50">
                    <p class="mb-0 ml-1">{{$interview_assessment->hr_strengths}}</p>
                </td>
                <td colspan="2" height="80" width="50">
                    <p class="mb-0 ml-1">{{$interview_assessment->hr_areas_of_improvements}}</p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 10; border:1px solid black;" border="0">
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1 font-weight-bold" style="text-decoration: underline;">Recommendation:</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="shade-box ml-1 d-inline-block" style="background-color:black;"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For further interview</p>
                </td>
                <td>
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For waiting list</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">Not qualified, (please specify reason)</p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0;" border="1">
            <tr>
                <td width="50">
                    <p class="ml-1" style="vertical-align: middle;">Interviewer's Signature:</p>
                </td>
                <td width="50">

                </td>
            </tr>
        </table>

        <div class="margin-top:100;">
            <p class="mb-0 text-uppercase font-weight-bold" style="font-size:10; margin-top:100;">immediate superior assessment</p>
        </div>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0;" border="1">
            <tr>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Interviewer's Name:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- @php
                            $hr_interviewer = $interview_assessment->applicant->mrf->interviewer->first();
                        @endphp

                        {{$hr_interviewer->user->name}} --}}
                    </p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Date:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- {{date('M d, Y')}} --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="4">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Functional</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="p-3">
                    <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 10;" border="1">
                        <tr>
                            <td></td>
                            <td>
                                <p class="mb-0 text-center">1</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">2</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">3</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">4</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Job Knowledge</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block"></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>None as pertains to this position</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block"></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Will need considerable training</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block"></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Basic but will learn on</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block"></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Well versed in position, little training needed</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block"></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Extremely well versed, able to work without further training</small></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Strengths</p>
                </td>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Areas for Improvement</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="80" width="50">
                    <p class="mb-0 ml-1"></p>
                </td>
                <td colspan="2" height="80" width="50">
                    <p class="mb-0 ml-1"></p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0; border:1px solid black;" border="0">
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1 font-weight-bold" style="text-decoration: underline;">Recommendation:</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="shade-box ml-1 d-inline-block" style="background-color:black;"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For further interview</p>
                </td>
                <td>
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For waiting list</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">Not qualified, (please specify reason)</p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0;" border="1">
            <tr>
                <td width="50">
                    <p class="ml-1 mb-2 mt-2">Interviewer's Signature:</p>
                </td>
                <td width="50">
                    <p class="ml-1 mb-2 mt-2">Date:</p>
                </td>
            </tr>
        </table>

        <div class="margin-top:100;">
            <p class="mb-0 text-uppercase font-weight-bold" style="font-size:10; margin-top:10;">Department Head Assessment</p>
        </div>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0;" border="1">
            <tr>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Interviewer's Name:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- @php
                            $hr_interviewer = $interview_assessment->applicant->mrf->interviewer->first();
                        @endphp

                        {{$hr_interviewer->user->name}} --}}
                    </p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0 font-weight-bold">Date:</p>
                </td>
                <td width="25">
                    <p class="ml-1 mb-0">
                        {{-- {{date('M d, Y')}} --}}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="4">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Functional</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="p-3">
                    <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 10;" border="1">
                        <tr>
                            <td></td>
                            <td>
                                <p class="mb-0 text-center">1</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">2</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">3</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">4</p>
                            </td>
                            <td>
                                <p class="mb-0 text-center">5</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="mb-0 text-center">Job Knowledge</p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->head_job_knowledge == 1) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>None as pertains to this position</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->head_job_knowledge == 2) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Will need considerable training</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->head_job_knowledge == 3) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Basic but will learn on</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->head_job_knowledge == 4) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Well versed in position, little training needed</small></p>
                            </td>
                            <td>
                                <div class="shade-box ml-1 d-inline-block" @if($interview_assessment->head_job_knowledge == 5) style="background-color:black;" @endif></div>
                                <p class="mb-0 d-inline" style="vertical-align: middle;"><small>Extremely well versed, able to work without further training</small></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Strengths</p>
                </td>
                <td style="background-color:rgb(225 227 225);" colspan="2">
                    <p class="ml-1 mb-0 font-weight-bold font-italic">Areas for Improvement</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="80" width="50%">
                    <p class="mb-0 ml-1">{!! nl2br($interview_assessment->head_strength) !!}</p>
                </td>
                <td colspan="2" height="80" width="50%">
                    <p class="mb-0 ml-1">{!! nl2br($interview_assessment->head_areas_for_improvement) !!}</p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0; border:1px solid black;" border="0">
            <tr>
                <td colspan="2">
                    <p class="mb-0 ml-1 font-weight-bold" style="text-decoration: underline;">Recommendation:</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="shade-box ml-1 d-inline-block" style="background-color:black;"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For further interview</p>
                </td>
                <td>
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">For waiting list</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="shade-box ml-1 d-inline-block"></div>
                    <p class="mb-0 d-inline" style="vertical-align: middle;">Not qualified, (please specify reason)</p>
                </td>
            </tr>
        </table>
        <table cellpadding='0' cellspacing='0' style="width:100%; padding:0; margin-top: 0;" border="1">
            <tr>
                <td width="50">
                    <p class="ml-1 mb-2 mt-2">Interviewer's Signature:</p>
                </td>
                <td width="50">
                    <p class="ml-1 mb-2 mt-2">Date:</p>
                </td>
            </tr>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
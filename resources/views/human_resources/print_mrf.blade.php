<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    {{--
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        .page_break {
            page-break-before: always;
            margin-top: 100px;
        }

        body {
            margin-top: 120px;
        }

        #first {
            display: none;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            margin-top: 10px;
        }

        body {
            /* font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif; */
            font-size: 9px;
        }

        @page {
            margin: 90px 50px 80px 50px;
        }

        .page-break {
            page-break-after: always;
        }

        header {
            position: fixed;
            top: -75px;
            left: 0px;
            right: 0px;
            color: black;
            text-align: left;
            background-color: #ffffff;
        }

        .text-right {
            text-align: right;
        }

        /* footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        .footer {
            position: fixed;
            top: 750px;
            left: 500px;
            right: 0px;
            height: 50px;
        } */

        .fixed {
            position: fixed;
            top: -135px;
            left: 800px;
            right: 0px;
            height: 20px;
        }

        /* .page-number:after {
            content: counter(page);
        } */

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
            margin: 0;
            padding: 0;
        }

        .upperline {
            -webkit-text-decoration-line: overline;
            /* Safari */
            text-decoration: overline
        }

        hr {
            margin-top: 0em;
            margin-bottom: 0em;
            border: none;
            height: 2px;
            /* Set the hr color */
            color: #333;
            /* old IE */
            background-color: #333;
            /* Modern Browsers */
        }

        hr.soft {
            margin-top: 0em;
            margin-bottom: 0em;
            border: none;
            height: .5px;
        }

        input[type=checkbox] {
            display: inline;
        }

        tr.no-bottom-border td {
            border-bottom: none;
            border-top: none;
        }
    </style>

</head>

</head>

<body>
    <header>
        <table style='width:100%;' border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td width='100px' style='width:20; text-align:center;' rowspan="2">
                    <img src="{{asset('img/wgroup.png')}}" alt="" height="100" style="margin: auto;">
                </td>
                <td colspan="3">
                    <span class='m-0 p-0' style='font-size:8;margin-top;0px;padding-top:0px;'>
                        <p class="text-center" style="font-weight: bold;">Subsidiaries and Affiliates </p>
                    </span>
                    <hr class='soft'>

                    <table style='font-size:9;margin-top;0px;padding-top:0px;' style='width:100%;' border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class='text-left' style='width:15%;'></td>
                            <td class='text-left'><input type='checkbox'> WGI</td>
                            <td class='text-left'><input type='checkbox'> WHI Carmona</td>
                            <td class='text-left'><input type='checkbox'> FMPI/FMTCC</td>
                        </tr>
                        <tr>
                            <td class='text-left' style='width:15%;'></td>
                            <td class='text-left'> <input type='checkbox'> WHI - HO</td>
                            <td class='text-left'><input type='checkbox'> CCC</td>
                            <td class='text-left'><input type='checkbox'> PBI</td>
                        </tr>
                        <tr>
                            <td class='text-left' style='width:15%;'></td>
                            <td class='text-left'> <input type='checkbox'> WLI</td>
                            <td class='text-left'><input type='checkbox'> MRDC </td>
                            <td class='text-left'><input type='checkbox'> Others: ________</td>
                        </tr>
                        <tr>
                            <td class='text-left' style='width:15%;'></td>
                            <td class='text-left'> <input type='checkbox'> PRI</td>
                            <td class='text-left'><input type='checkbox'> SPAI </td>
                            {{-- <td class='text-left'><input type='checkbox'> </td> --}}
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p style="font-size: 10;">Form Number:</p>
                    <p style="font-size: 10; font-weight:bold;" class="text-center">FR-HRD-001</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 10;">Revision Number:</p>
                    <p style="font-size: 10; font-weight:bold;" class="text-center">00</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 10;">Effectivity Date:</p>
                    <p style="font-size: 10; font-weight:bold;" class="text-center">May 2, 2019</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class='text-center p-1'>
                    <p style="font-size: 10">Form Title :</p>
                    <p style="font-weight: bold; font-size:17px;" class="text-center">MANPOWER REQUISITION FORM</p>
                </td>
            </tr>
        </table>
    </header>

    <div style="border: .5 solid black; margin-top:40;">
        <div style="width:100%; background:rgb(170, 170, 170); ">
            <p style="font-size: 12px; padding:2px;"><b>I. POSITION</b> <span><i>(to be filled-out by Department Head)</i></span></p>
        </div>
        <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="100" class="mb-3">Position Title</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->jobPosition->position}}</div>
                </td>
            </tr>
            <tr>
                <td width="100" class="mb-3">Company</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->company->name}}</div>
                </td>
            </tr>
            <tr>
                <td width="100" class="mb-3">Department</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->department->name}}</div>
                </td>
            </tr>
            <tr>
                <td width="100" class="mb-3">Date Requested</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{date('M d, Y', strtotime($mrf->created_at))}}</div>
                </td>
            </tr>
            <tr>
                <td width="100" class="mb-3">Target Date of On-boarding</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{date('M d, Y', strtotime($mrf->target_date))}}</div>
                </td>
            </tr>
            <tr>
                <td width="100" class="mb-3">Position Status:</td>
                <td width="auto">
                    <table border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="100"><input type="checkbox" @if($mrf->position_status == "Replacement") checked @endif> Replacement of</td>
                            <td>
                                @if($mrf->position_status == "Replacement")
                                <div style="border-bottom: .5px solid black; width:100%;">:</div>
                                @else
                                <div style="border-bottom: .5px solid black; width:100%;">: </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="100"><input type="checkbox" @if($mrf->position_status == "New Position") checked @endif> New Position</td>
                            <td>
                                @if($mrf->position_status == "New Position")
                                <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->justification}}</div>
                                @else
                                <div style="border-bottom: .5px solid black; width:100%;">: &nbsp;</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="100"><input type="checkbox" @if($mrf->position_status == "Additional") checked @endif> Additional</td>
                            <td>
                                @if($mrf->position_status == "Additional")
                                <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->justification}}</div>
                                @else
                                <div style="border-bottom: .5px solid black; width:100%;">: &nbsp;</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="120">Please attach the following:</td>
                <td>
                    <table border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
                        <tr>
                            <td><input type="checkbox" @if($mrf->is_plantilla == 1) checked @endif> Plantilla</td>
                            <td><input type="checkbox" @if($mrf->is_job_description == 1) checked @endif> Job Description</td>
                            <td><input type="checkbox" @if($mrf->is_resignation_letter == 1) checked @endif> Resigned</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="border: .5 solid black; margin-top:0;">
        <div style="width:100%; background:rgb(170, 170, 170); ">
            <p style="font-size: 12px; padding:2px;"><b>II. QUALIFICATION</b> <span><i>(to be filled-out by Department Head)</i></span></p>
        </div>
        <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="150" class="mb-3">Educational Attainment (degree)</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: asdsad</div>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3">Work Experience (years)</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">:  {{$mrf->work_experience}}</div>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3">Specific Field</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->specific_field}}</div>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3">Special Skills</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->special_skills}}</div>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3">Others</td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->others}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div style="border: .5 solid black; margin-top:0;">
        <div style="width:100%; background:rgb(170, 170, 170); ">
            <p style="font-size: 12px; padding:2px;"><b>III. EMPLOYMENT DETAILS</b> <span><i>(to be filled-out by Department Head)</i></span></p>
        </div>
        <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="150" class="mb-3">Employment Status:</td>
                <td width="auto">
                    <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <input type="checkbox" @if($mrf->employment_status == 'Probationary') checked @endif> Probationary
                            </td>
                            <td>
                                <input type="checkbox" @if($mrf->employment_status == 'Contractual') checked @endif> Contractual
                            </td>
                            <td>
                                Employment Duration: _______________
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox"> Special Project
                            </td>
                            <td>
                                <input type="checkbox"> Consultant
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3"><p>Salary Rate / Range:</p></td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->salary_range}}</div>
                </td>
            </tr>
            <tr>
                <td width="150" class="mb-3"><p>Other Remarks:</p></td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:100%;">: {{$mrf->other_remarks}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div style="border: .5 solid black; margin-top:0;">
        <div style="width:100%; background:rgb(170, 170, 170); ">
            <p style="font-size: 12px; padding:2px;"><b>IV. UPON HIRING</b> <span><i>(to be filled-out by HR)</i></span></p>
        </div>
        <table class="p-1 mb-1" border='0' style='width:100%;font-size:9; margin-top:8;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="60" class="mb-3">
                    <p>Date Served:</p>
                </td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:50%;">&nbsp;</div>
                </td>
                <td width="60" class="mb-3">
                    <p>Start Date:</p>
                </td>
                <td width="auto">
                    <div style="border-bottom: .5px solid black; width:50%;">&nbsp;</div>
                </td>
            </tr>
        </table>
        <hr>
        <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8; border-bottom:.5 solid black;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%">
                    <p style="text-align: center;">Requested by:</p>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">Department Head</p>
                </td>
                <td width="50%">
                    <p style="text-align: center;">Approved by:</p>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">HR Department Head</p>
                </td>
            </tr>
        </table>
        <table class="p-1" border='0' style='width:100%;font-size:9; margin-top:8; border-top:.5 solid black;' cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%">
                    <p style="text-align: center;">Approved by:</p>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">Head of Business Unit</p>
                </td>
                <td width="50%">
                    <p style="text-align: center;">Received by:</p>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">HR Analyst - Recruitment</p>
                </td>
            </tr>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
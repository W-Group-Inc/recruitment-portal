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
            margin-top: 120px;
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            margin: 90px 30px 80px 30px;
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

        td {
            padding-left: 1px;
            padding-right: 1px;
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

        table#jo_info tr td
        {
            padding: 2;
        }

        /* .company_underline::after {
            content: "";
            position: absolute;
            width: 20%;
            left: 0;
            bottom: 0;
            height: 1px;
            background-color: black;
        } */
    </style>

</head>

<body>
    <header>
        <div class="text-center mb-0">
            <img src="{{asset('img/wgroup.png')}}" class="mb-0 p-0" height="70" width="100">
        </div>
        <p style="line-height:1.1; font-size: 8; margin-top:-7;" class="font-weight-bold mb-0 text-center">W GROUP INC.</p>
        <p style="line-height:1.1; font-size: 8;" class="mb-0 p-0 text-center">26th Floor, W Building, Fifth Avenue, Bonifacio Global City, Taguig City, Philippines 1634</p>
        <p style="line-height:1.1; font-size: 8;" class="mb-0 p-0 text-center">Tel. No.: (+632) 8856 3838 | Fax No.: (+632) 8856 1033</p>
        <p style="line-height:1.1; font-size: 8;" class="mb-0 p-0 text-center">Email: wgicentralizedcomm@wgroup.com.ph</p>
        <p style="line-height:1.1; font-size: 8;" class="mb-0 p-0 text-center">Website: www.wgroup.com.ph</p>
    </header>
    <div class="page-break">
        <p style="font-size:10; margin-top:-50;" class="text-center font-weight-bold">JOB APPLICATION FORM</p>
        <p style="font-size:8;" class="font-weight-bold">COMPANY: <span class="company_underline" style="border-bottom:1px solid black;">{{$job_application->company->name}}</span></p>

        <table cellpadding="0" cellspacing="0" style="border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; width:100%; table-layout:fixed;">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">I. SOURCE</p>
                </td>
            </tr>
            <tr>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox" @if($job_application->source == 1) checked @endif> <span style="font-size:8;">Walk in</span>
                </td>
                <td style="border: 0;"  class="m-2">
                    <input type="checkbox" @if($job_application->source == 2) checked @endif> <span style="font-size:8;">PESO</span>
                </td>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"  @if($job_application->source == 3) checked @endif> <span style="font-size:8;">Advertisement</span>
                </td>
                <td style="border: 0;">
                    <input type="checkbox" class="m-2" @if($job_application->source == 4) checked @endif> <span style="font-size:8;">Job Fair</span>
                </td>
            </tr>
            <tr>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"  @if($job_application->source == 5) checked @endif><span style="font-size:8;">Online Application:</span>
                    <p style="font-size:8; border-bottom: 1px solid black; width:20%;" class="d-inline">{{$job_application->application}}</p>
                    <p style="font-size: 5;">(Jobstreet, Indeed, Social Media, etc.)</p>
                </td>
                <td style="border: 0;" class="m-2">
                    <span class="online-app" style="font-size:8; position: relative; text-decoration: underline;"></span>
                </td>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox" @if($job_application->source == 6) checked @endif> <span style="font-size:8;">Employee Referral:</span>
                    <p style="font-size:8; border-bottom: 1px solid black; width:20%;" class="d-inline">{{$job_application->employee}}</p>
                    <p style="font-size: 5;">(Referred by:)</p>
                </td>
                <td style="border: 0;">
                    {{-- <input type="checkbox" class="m-2"> <span style="font-size:8;"></span> --}}
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%;" class="mt-0">
            <tr>
                <td colspan="4" style="border-left:2px solid black; border-right:2px solid black; border-top:2px solid black;">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">II. POSITION APPLIED FORM</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black; table-layout:fixed;" class="mt-0">
            <tr>
                <td style="border: 2px solid black; vertical-align:top;">
                    <p style="font-size:8;" class="m-0"><small>POSITION DESIRED</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->position}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:top;">
                    <p style="font-size:8;"><small>MINIMUM EXPECTED SALARY</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{number_format($job_application->minimum_expected_salary)}} PHP</p>
                </td>
                <td style="border: 2px solid black; vertical-align:top;">
                    <p style="font-size:8;"><small>DATE AVAILABLE FOR EMPLOYMENT</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{date('M. d, Y', strtotime($job_application->date_available_for_employment))}}</p>
                </td>
                {{-- <td></td> --}}
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="width: 100%;" class="mt-2">
            <tr>
                <td colspan="4" style="border-left:2px solid black; border-right:2px solid black; border-top:2px solid black;">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">III. PERSONAL DATA</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; table-layout:fixed;" class="mt-0">
            <tr>
                <td style="vertical-align:top;">
                    <p style="font-size:8;" class="m-0"><small>LAST NAME</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->lastname}}</p>
                </td>
                <td style="vertical-align:top;">
                    <p style="font-size:8;"><small>FIRST NAME</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->firstname}}</p>
                </td>
                <td style="vertical-align:top;">
                    <p style="font-size:8;"><small>MIDDLE NAME</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->middlename}}</p>
                </td>
                {{-- <td></td> --}}
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; table-layout:fixed;" class="mt-0">
            <tr>
                @php
                    $present_address = $job_application->present_house_no.' '.$job_application->present_street_name.' '.$job_application->present_barangay.' '.$job_application->present_municipality;
                    $permanent_address = $job_application->permanent_house_no.' '.$job_application->permanent_street_name.' '.$job_application->permanent_barangay.' '.$job_application->permanent_municipality;
                @endphp
                <td style="vertical-align:top;">
                    <p style="font-size:8;" class="m-0"><small>PRESENT ADDRESS</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$present_address}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;">
                    <p style="font-size:8;"><small>PERMANENT ADDRESS</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$permanent_address}}</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; table-layout:auto;" class="mt-0">
            <tr>
                <td style="vertical-align:top;" width="20%">
                    <p style="font-size:8;" class="m-0"><small>CONTACT NUMBER</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->contact_number}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" width="30%">
                    <p style="font-size:8;"><small>CIVIL STATUS</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->civil_status}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" width="10%">
                    <p style="font-size:8;"><small>AGE</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->age}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;"  width="10%">
                    <p style="font-size:8;"><small>GENDER</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->gender}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;">
                    <p style="font-size:8;"><small>CITIZENSHIP</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->citizenship}}</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black; table-layout:fixed;" class="mt-0">
            <tr>
                <td style="vertical-align:top;">
                    <p style="font-size:8;" class="m-0"><small>DATE OF BIRTH</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{date('M. d, Y', strtotime($job_application->date_of_birth))}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;">
                    <p style="font-size:8;"><small>PLACE OF BIRTH</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->place_of_birth}}</p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black; table-layout:auto;" class="mt-2">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">III. FAMILY BACKGROUND <small><i>(*add N/A if not applicable)</i></small></p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">NAME</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">OCCUPATION</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">COMPANY LOCATION</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">CONTACT NO.</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;">
                    <p style="font-size:8;"><small>FATHER</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->father_name}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->father_occupation}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->father_company_location}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->father_contact_no}}</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;">
                    <p style="font-size:8;"><small>MOTHER</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->mother_name}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->mother_occupation}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->mother_company_location}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->mother_contact_no}}</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;">
                    <p style="font-size:8;"><small>SIBLINGS</small></p>
                    @foreach ($job_application->siblingInformation as $sibling)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->sibling_name}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    @foreach ($job_application->siblingInformation as $sibling)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->sibling_occupation}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    @foreach ($job_application->siblingInformation as $sibling)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->sibling_company_location}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    @foreach ($job_application->siblingInformation as $sibling)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->sibling_contact_no}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;">
                    <p style="font-size:8;"><small>SPOUSE</small></p>
                    <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->spouse_name}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->spouse_occupation}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->spouse_company_location}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:bottom;">
                    <p style="font-size:9;" class="mb-0 p-0 text-center">{{$sibling->spouse_contact_no}}</p>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;">
                    <p style="font-size:8;"><small>CHILDREN</small></p>
                    @foreach ($job_application->childrenInformation as $children)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$children->children_name}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black">
                    @foreach ($job_application->childrenInformation as $children)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$children->children_occupation}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black">
                    @foreach ($job_application->childrenInformation as $children)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$children->children_company_location}}</p>
                    @endforeach
                </td>
                <td style="border: 2px solid black">
                    @foreach ($job_application->childrenInformation as $children)
                        <p style="font-size:9;" class="mb-0 p-0 text-center">{{$children->children_contact_no}}</p>
                    @endforeach
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black;" class="mt-2">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">III. EDUCATIONAL BACKGROUND</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">COURSE</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">NAME & ADDRESS OF SCHOOL</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">YEAR ATTENDED FROM - TO</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">DEGREE/HONORS/AWARD/ RECOGNITIONS RECEIVED</p>
                </td>
            </tr>
            <tr>
                <td style="border: 2px solid black;">
                    <p style="font-size:8;" class="text-center">HIGH SCHOOL</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->hs_school_name}}</p>
                    <p style="font-size:8;" class="text-center">{{$job_application->hs_school_address}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->hs_year_attended}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->hs_awards}}</p>
                </td>
            </tr>
            <tr>
                <td style="border: 2px solid black;">
                    <p style="font-size:8;" class="text-center">COLLEGE</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->college_school_name}}</p>
                    <p style="font-size:8;" class="text-center">{{$job_application->college_school_address}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->college_year_attended}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->college_awards}}</p>
                </td>
            </tr>
            <tr>
                <td style="border: 2px solid black;">
                    <p style="font-size:8;" class="text-center">OTHERS</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->others_school_name}}</p>
                    <p style="font-size:8;" class="text-center">{{$job_application->others_school_address}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->others_year_attended}}</p>
                </td>
                <td style="border: 2px solid black">
                    <p style="font-size:8;" class="text-center">{{$job_application->others_awards}}</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black;" class="mt-2">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">IV. EXAMINATION UNDERTAKEN</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">LICENSURE EXAMINATION</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">RATING</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">GOVERNMENT EXAMINATION</p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">TOTAL RATING</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">
                        @if($job_application->licensure_examination != null)
                        {{$job_application->licensure_examination}}
                        @else
                        &nbsp;
                        @endif
                    </p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">
                        @if($job_application->rating != null)
                            {{$job_application->rating}}
                        @else
                        &nbsp;
                        @endif
                    </p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">
                        @if($job_application->government_examination != null)
                        {{$job_application->government_examination}}
                        @else
                        &nbsp;
                        @endif
                    </p>
                </td>
                <td style="border:2px solid black;">
                    <p class="text-center" style="font-size: 8;">
                        @if($job_application->gov_rating != null)
                        {{$job_application->gov_rating}}
                        @else
                        &nbsp;
                        @endif
                    </p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black;" class="mt-2">
            <tr style="border: 2px solid black;">
                <td colspan="3">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">V. WORK EXPERIENCES (START FROM THE MOST RECENT)</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>1. NAME & ADDRESS OF THE COMPANY</small></p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->name_of_company}}</p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->address_of_company}}</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>POSITION</small></p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->position}}</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>EMPLOYMENT PERIOD</small></p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->employment_period}}</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>COMPANY INDUSTRY</small></p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->company_industry}}</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>REASON FOR LEAVING</small></p>
                    <p style="font-size: 9;" class="text-center">{!! nl2br($job_application->reason_for_leaving) !!}</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>LAST SALARY</small></p>
                    <p style="font-size: 9;" class="text-center">{{$job_application->last_salary}} PHP</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>2. NAME & ADDRESS OF THE COMPANY</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>POSITION</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>EMPLOYMENT PERIOD</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>COMPANY INDUSTRY</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>REASON FOR LEAVING</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
                <td style="border:2px solid black;" class="align-top">
                    <p style="font-size: 8;"><small>LAST SALARY</small></p>
                    <p style="font-size: 9;" class="text-center">&nbsp;</p>
                </td>
            </tr>
        </table>
        <p style="font-size: 8;"><small>I hereby give my consent to _____________ to collect my personal data and information for purpose of considering for employment. All the information I provided shall be treated in strict
            confidence and the same shall not be shared to third persons without my written permission or consent, except as may be provided by laws. I understand and agree that any malicious
            information, misrepresentation of fact or any omission, which tends to missed will be considered sufficient ground for my disqualification of my application.</small></p>

        <p class="text-center mt-5 mb-2 mx-auto" style="border-top: 2px solid black; width:50%; font-size:9;">APPLICANT SIGNATURE OVER PRINTED NAME/ DATE</p>

        <p style="font-size: 8;"><small>The Data Privacy Law of the Philippines otherwise known as Republic Act No. 10173 protects the personal information entrusted by the person to an entity. _______________adheres to
the law hence, all information contained will be treated with utmost privacy and confidentiality. Rest assured that your personal information is safely handled herein.</small></p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
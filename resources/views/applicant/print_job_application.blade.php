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

        <table cellpadding="0" cellspacing="0" style="border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; width:100%;">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">I. SOURCE</p>
                </td>
            </tr>
            <tr>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"> <span style="font-size:8;">Walk in</span>
                </td>
                <td style="border: 0;"  class="m-2">
                    <input type="checkbox"> <span style="font-size:8;">PESO</span>
                </td>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"> <span style="font-size:8;">Advertisement</span>
                </td>
                <td style="border: 0;">
                    <input type="checkbox" class="m-2"> <span style="font-size:8;">Job Fair</span>
                </td>
            </tr>
            <tr>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"><span style="font-size:8;">Online Application</span>
                </td>
                <td style="border: 0;" class="m-2">
                    <span class="online-app" style="font-size:8; position: relative; text-decoration: underline;"></span>
                </td>
                <td style="border: 0;" class="m-2">
                    <input type="checkbox"> <span style="font-size:8;">Employee Referal</span>
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
                <td style="border: 2px solid black; vertical-align:top;" height="25">
                    <p style="font-size:8;" class="m-0"><small>POSITION DESIRED</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->position}}</p>
                </td>
                <td style="border: 2px solid black; vertical-align:top;" height="25">
                    <p style="font-size:8;"><small>MINIMUM EXPECTED SALARY</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{number_format($job_application->minimum_expected_salary)}} PHP</p>
                </td>
                <td style="border: 2px solid black; vertical-align:top;" height="25">
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
                <td style="vertical-align:top;" height="25">
                    <p style="font-size:8;" class="m-0"><small>LAST NAME</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->lastname}}</p>
                </td>
                <td style="vertical-align:top;" height="25">
                    <p style="font-size:8;"><small>FIRST NAME</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$job_application->firstname}}</p>
                </td>
                <td style="vertical-align:top;" height="25">
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
                <td style="vertical-align:top;" height="25">
                    <p style="font-size:8;" class="m-0"><small>PRESENT ADDRESS</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$present_address}}</p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>PERMANENT ADDRESS</small></p>
                    <p class="mb-0 text-center" style="font-size:9;">{{$permanent_address}}</p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; table-layout:auto;" class="mt-0">
            <tr>
                <td style="vertical-align:top;" height="25" width="20%">
                    <p style="font-size:8;" class="m-0"><small>CONTACT NUMBER</small></p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25" width="30%">
                    <p style="font-size:8;"><small>CIVIL STATUS</small></p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25" width="10%">
                    <p style="font-size:8;"><small>AGE</small></p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25"  width="10%">
                    <p style="font-size:8;"><small>GENDER</small></p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>CITIZENSHIP</small></p>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black; table-layout:fixed;" class="mt-0">
            <tr>
                <td style="vertical-align:top;" height="25">
                    <p style="font-size:8;" class="m-0"><small>DATE OF BIRTH</small></p>
                </td>
                <td style="vertical-align:top; border-left: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>PLACE OF BIRTH</small></p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black; table-layout:fixed;" class="mt-2">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">FAMILY BACKGROUND <small><i>(*add N/A if not applicable)</i></small></p>
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
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>FATHER</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>MOTHER</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>SIBLINGS</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>SPOUSE</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>CHILDREN</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%; border:2px solid black;" class="mt-0">
            <tr style="border: 2px solid black;">
                <td colspan="4">
                    <p class="mb-0 font-weight-bold" style="font-size:8; background-color:#e1dfdf;">III. EDUCATIONAL BACKGROUND</p>
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
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>FATHER</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>MOTHER</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>SIBLINGS</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>SPOUSE</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top; border: 2px solid black;" height="25">
                    <p style="font-size:8;"><small>CHILDREN</small></p>
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
                <td height="25" style="border: 2px solid black">
                    
                </td>
            </tr>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
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

        footer {
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
        }

        .fixed {
            position: fixed;
            top: -135px;
            left: 800px;
            right: 0px;
            height: 20px;
        }

            .page-number:after {
                content: counter(page);
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
    </style>

</head>

<body>
    <header>
        <footer>
            <table style='width:100%;' border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class='text-left"'>
                        <p class="m-0" style="font-size:9;">WGI-TP-HRD-005</p>
                        <p class="m-0" style="font-size:9;">Rev. 2 10/29/2024</p>
                    </td>
                    <td class='text-center'>
                        <i ></i>
                    </td>
                    <td class='text-right'>
                        <span class="page-number">Page <script type="text/php">{PAGE_NUM} of {PAGE_COUNT}</script></span>
                    </td>
                </tr>
            </table>
        </footer>
        <table style='width:100%;' border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td width='100px' style='width:20; text-align:center;' rowspan="1">
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
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" class='text-center p-1'>
                    <p style="font-size: 10">Form Title :</p>
                    <p style="font-weight: bold; font-size:17px;" class="text-center">JOB OFFER</p>
                </td>
            </tr>
        </table>
    </header>
    
    <div class="page-break">
        <table style="width: 100%; margin-bottom:5" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="80">
                    <p style="font-size: 9">Date</p>
                </td>
                <td width="20">:</td>
                <td>
                    <p style="font-size: 9">{{date('F d, Y')}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9">To</p>
                </td>
                <td>:</td>
                <td>
                    @php
                        $full_name = $applicant->firstname.' '.$applicant->middlename.' '.$applicant->lastname;
                    @endphp
                    <p style="font-size: 9"><strong>{{strtoupper($full_name)}}</strong></p>
                    <p style="font-size: 9">Quezon City</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9">Rev</p>
                </td>
                <td>:</td>
                <td>
                    <p style="font-size: 9"><strong>Job Offer</strong></p>
                </td>
            </tr>
        </table>
        <hr class="mb-2">
        <p style="font-size: 9;" class="mb-2">Dear <strong>Mr. / Ms.</strong>
            <span style="border-bottom: .5px solid black; width: 50%; padding-top: 2px; font-size:9">{{$applicant->lastname}}</span> ,
        </p>
        <p style="font-size:9; text-indent: 20;">
            We are pleased to offer you employment with our company. We trust that your knowledge, skills and experience will help
            us contribute to the attainment of our corporate goals. Below are the essential points of your employment details. Should you find
            this acceptable, please affix your signature on the space provided.
        </p>

        <table style="width:100%;" border="1" cellspacing="0" cellpadding="0" id="jo_info">
            <tr>
                <td width="50%">
                    <p style="font-size: 9;">I. Designation </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->mrf->jobPosition->position}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">II. Department </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->mrf->department->name}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">III. Place of Work </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->mrf->department->company->address}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">IV. Employment Status </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->mrf->employment_status}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">V. Immediate Head </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->jobOffer->immediate_head}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">VI. Work Schedule </p>
                </td>
                <td>
                    @php
                        $work_schedule = explode(" ",$applicant->jobOffer->work_schedule);
                        $time_in = date('g:i A', strtotime($work_schedule[0]));
                        $time_out = date('g:i A', strtotime($work_schedule[2]));
                    @endphp
                    <p style="font-size: 9">{{$time_in.' - '.$time_out}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">VII. Compensation </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->jobOffer->compensation}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">VIII. Upon regularization*
                    </p>
                    <p>
                        <i>regularization can either be on the 3rd or 6th month,
                            depending on performance evaluation results</i>
                    </p>
                </td>
                <td>
                    <p style="font-size: 9"><small>{{$applicant->jobOffer->upon_regularization}}</small></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 9;">IX. Start Date </p>
                </td>
                <td>
                    <p style="font-size: 9">{{date('F d, Y', strtotime($applicant->jobOffer->start_date))}}</p>
                </td>
            </tr>
            @if($applicant->jobOffer->others != null)
            <tr>
                <td>
                    <p style="font-size: 9;">Others </p>
                </td>
                <td>
                    <p style="font-size: 9">{{$applicant->jobOffer->others}}</p>
                </td>
            </tr>
            @endif
        </table>
        <p style="font-size: 9" class="mt-2">
            Also, please note that this formal job offer is contingent / conditional based on your result on the following:
        </p>
        <p style="font-size: 9; text-indent:15;">
            1. Background check.
        </p>
        <p style="font-size: 9; text-indent:15;">
            2. Presumption that all information you provided during the recruitment process are valid and true and
        </p>
        <p style="font-size: 9; text-indent:15;">
            3. Pre-employment medical exam.
        </p>
        <p style="font-size: 9; text-indent:15;">
            4. Adherence to the company’s confidentiality and non-disclosure policies
        </p>
        <p style="font-size:9;" class="mt-3">
            A probationary employment contract will follow right after this signing. Looking forward to your positive response. Together, let us make a difference
        </p>

        <table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%">
                    <p style="font-size: 9">Very truly yours,</p>
                </td>
                <td>
                    <p style="font-size: 9">Noted by:</p>
                </td>
            </tr>
        </table>

        <table style="width: 100%;" class="mt-5" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="50%" style="text-align: center;">
                    <p class="text-center" style="font-size: 9; margin-bottom: 0;">{{$hr_manager->name}}</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">
                        (Signature over Printed Name/Date)
                    </p>
                </td>
                <td style="text-align: center;">
                    <p class="text-center" style="font-size: 9; margin-bottom: 0;">{{$applicant->mrf->department->head->name}}</p>
                    <p style="text-align: center; border-top: .5px solid black; width: 50%; margin: 0 auto; padding-top: 2px;">
                        (Signature over Printed Name/Date)
                    </p>
                </td>
            </tr>
        </table>

        <table style="width: 100%;" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p style="font-size: 9;" class="text-center p-1">Prepared by:</p>
                </td>
                <td><p style="font-size: 9;" class="text-center p-1">Approved by:</p></td>
                <td>
                    <p style="font-size: 9;" class="text-center p-1">Employee's Signature</p>
                </td>
            </tr>
            <tr>
                <td width="33.33%" class="text-center p-1">
                    <div class="mt-4">
                        <p style="font-size: 9" class="text-center">{{auth()->user()->name}}</p>
                        <p style="text-align: center; border-top: 1px solid black; margin: 0 auto; width: 80%; padding-top: 2px;">
                            <b>HR Assistant</b> <br>
                            <span>(Signature over Printed Name/Date)</span>
                        </p>
                    </div>
                </td>
                <td width="33.33%" class="text-center p-1">
                    <div class="mt-4">
                        <p style="font-size: 9" class="text-center">&nbsp;</p>
                        <p style="text-align: center; border-top: 1px solid black; margin: 0 auto; width: 80%; padding-top: 2px;">
                            <b>Top Management</b> <br>
                            <span>(Signature over Printed Name/Date)</span>
                        </p>
                    </div>
                </td>
                <td width="33.33%" class="text-center p-1">
                    <div class="mt-4">
                        <p style="font-size: 9" class="text-center">{{strtoupper($applicant->firstname.' '.$applicant->middlename.' '.$applicant->lastname)}}</p>
                        <p style="text-align: center; border-top: 1px solid black; margin: 0 auto; width: 80%; padding-top: 2px;">
                            <b>Employee</b> <br>
                            <span>(Signature over Printed Name/Date)</span>
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
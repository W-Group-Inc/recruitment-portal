<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ChildrenInformation;
use App\HistoryApplicant;
use App\Interviewer;
use App\JobApplication;
use App\ManPowerRequisitionForm;
use App\Notifications\ApplicantCredentialsNotification;
use App\Notifications\ApplicantStatusFailedNotification;
use App\Notifications\ApplicantStatusNotification;
use App\Notifications\FailedApplicantNotification;
use App\Notifications\NotifyDepartmentHead;
use App\Schedule;
use App\SiblingInformation;
use App\User;
use Carbon\Carbon;
use DateTime;
use Google_Client;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::get();
        $mrf = ManPowerRequisitionForm::where('is_close', null)->where('mrf_status', 'Approved')->get();
        if (auth()->user()->role == "Department Head")
        {
            $applicants = Applicant::whereHas('mrf', function($q) {
                $q->where('department_id', auth()->user()->department_id);
            })->get();
        }

        return view('human_resources.applicant', compact('applicants', 'mrf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $applicant = new Applicant;
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->mobile_number = $request->mobile_number;
        $applicant->man_power_requisition_form_id = $request->position;
        $applicant->applicant_status = 'Pending';
        
        $attachment = $request->file('resume');
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path('resume'),$name);

        $applicant->resume = '/resume/'.$name;
        $applicant->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::with('schedule', 'mrf', 'historyApplicant')->findOrFail($id);
        // $interviewer = Interviewer::where('status', 'Pending')->first();
        
        // $get_events = Event::get();
        // $events = $get_events[0];

        return view('human_resources.view_applicant', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        $applicant = Applicant::findOrFail($id);
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->mobile_number = $request->mobile_number;
        $applicant->man_power_requisition_form_id = $request->position;
        $applicant->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function schedule(Request $request)
    {
        $event = new Event;
        $event->creator = auth()->user()->email;
        $event->name = $request->event_name;
        $event->startDateTime = Carbon::parse($request->event_start);
        $event->endDateTime = $event->startDateTime->copy()->addHour();
        $event->googleEvent->colorId = 3;
        $event->save();

        $schedule = new Schedule;
        $schedule->schedule_name = $request->event_name;
        $schedule->date_time = date('Y-m-d h:i:s', strtotime($request->event_start));
        $schedule->applicant_id = $request->applicant_id;
        $schedule->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    public function printJo($id)
    {
        $applicant = Applicant::with('mrf')->findOrFail($id);
        // dd($applicant->mrf->department->name);
        $data = [];
        $data['applicant'] = $applicant;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('human_resources.print_jo', $data)->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function updateApplicantStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $applicant = Applicant::with('mrf.department.head', 'mrf.interviewer')->findOrFail($id);

        if ($request->action == "passed")
        {
            $interviewer = Interviewer::findOrFail($request->interviewer_id);
            $interviewer->status = 'Passed';
            $interviewer->save();

            $nextInterviewer = Interviewer::where('status', 'Waiting')->orderBy('level', 'asc')->get();
            if ($nextInterviewer->isNotEmpty())
            {
                foreach($nextInterviewer as $key=>$nextInterview)
                {
                    if ($key == 0)
                    {
                        $nextInterview->status = 'Pending';
                    }
                    else
                    {
                        $nextInterview->status = 'Waiting';
                    }

                    $nextInterview->save();
                }
            }
            else
            {
                $applicant->applicant_status = "Passed";
                $applicant->save();

                $password = Str::random(8);

                $user = new User;
                $user->name = $applicant->name;
                $user->email = $applicant->email;
                $user->password = bcrypt($password);
                $user->status = 'Active';
                $user->role = 'Applicant';
                $user->department_id = $applicant->mrf->department_id;
                $user->company_id = $applicant->mrf->company_id;
                $user->applicant_id = $applicant->id;
                $user->save();

                $applicant->notify(new ApplicantCredentialsNotification($user, $applicant, $password));

                $mrf = ManPowerRequisitionForm::where('id', $applicant->man_power_requisition_form_id)->first();
                $mrf->is_close = 1;
                $mrf->save();
            }

            if (auth()->user()->role == 'Human Resources')
            {
                $dept_head = $applicant->mrf->department->head;
                $dept_head->notify(new NotifyDepartmentHead($applicant->mrf, $dept_head));

                $applicant->notify(new ApplicantStatusNotification($applicant));
            }

            $history = new HistoryApplicant;
            $history->applicant_id = $applicant->id;
            $history->status = $interviewer->status;
            $history->position = $applicant->mrf->position_title;
            $history->date_applied = date('Y-m-d', strtotime($applicant->created_at));
            $history->user_id = $interviewer->user_id;
            $history->save();

            Alert::success('The applicant has passed the job interview.')->persistent('Dismiss');
        }
        elseif($request->action == "failed")
        {
            $interviewer = Interviewer::findOrFail($request->interviewer_id);
            $interviewer->status = 'Failed';
            $interviewer->save();

            $applicant->remarks = $request->remarks;
            $applicant->save();

            $nextInterviewer = Interviewer::where('status', 'Waiting')->orderBy('level', 'asc')->get();
            if ($nextInterviewer->isNotEmpty())
            {
                foreach($nextInterviewer as $key=>$nextInterview)
                {
                    $nextInterview->status = 'Failed';
                    $nextInterview->save();
                }

                $applicant->applicant_status = "Failed";
                $applicant->save();
            }
            else
            {
                $applicant->applicant_status = "Failed";
                $applicant->save();
            }

            if (auth()->user()->role == 'Human Resources')
            {
                $dept_head = $applicant->mrf->department->head;
                $dept_head->notify(new FailedApplicantNotification($applicant->mrf, $dept_head));

                $applicant->notify(new ApplicantStatusFailedNotification($applicant));
            }

            $history = new HistoryApplicant;
            $history->applicant_id = $applicant->id;
            $history->status = $interviewer->status;
            $history->position = $applicant->mrf->position_title;
            $history->date_applied = date('Y-m-d', strtotime($applicant->created_at));
            $history->user_id = $interviewer->user_id;
            $history->save();

            Alert::success('The applicant has failed the job interview.')->persistent('Dismiss');
        }

        return back();
    }

    public function applicant()
    {
        $applicant = Applicant::with('jobApplication')->where('id', auth()->user()->applicant_id)->first();
        
        return view('applicant.applicants', compact('applicant'));
    }

    public function jobApplicationForm(Request $request)
    {
        $job_application = JobApplication::where('applicant_id', auth()->user()->applicant_id)->first();

        if ($job_application == null)
        {
            $job_application = new JobApplication;
            $job_application->company_id = $request->company_id;
            $job_application->source = $request->source;
            $job_application->employee = $request->employee;
            $job_application->position = $request->position;
            $job_application->minimum_expected_salary = $request->minimum_expected_salary;
            $job_application->date_available_for_employment = $request->date_available_for_employment;
            $job_application->lastname = $request->lastname;
            $job_application->firstname = $request->firstname;
            $job_application->middlename = $request->middlename;
            $job_application->present_house_no = $request->present_house_no;
            $job_application->present_street_name = $request->present_street_name;
            $job_application->present_barangay = $request->present_barangay;
            $job_application->present_municipality = $request->present_municipality;
            $job_application->permanent_house_no = $request->permanent_house_no;
            $job_application->permanent_street_name = $request->permanent_street_name;
            $job_application->permanent_barangay = $request->permanent_barangay;
            $job_application->permanent_municipality = $request->permanent_municipality;
            $job_application->father_name = $request->father_name;
            $job_application->father_occupation = $request->father_occupation;
            $job_application->father_company_location = $request->father_company_location;
            $job_application->father_contact_no = $request->father_contact_no;
            $job_application->mother_name = $request->mother_name;
            $job_application->mother_occupation = $request->mother_occupation;
            $job_application->mother_company_location = $request->mother_company_location;
            $job_application->mother_contact_no = $request->mother_contact_no;
            $job_application->college_course = $request->course;
            $job_application->college_school_name = $request->college_school_name;
            $job_application->college_school_address = $request->college_school_address;
            $job_application->college_year_attended = $request->college_year_attended;
            $job_application->college_awards = $request->college_awards;
            $job_application->hs_course = $request->hs_course;
            $job_application->hs_school_name = $request->hs_school_name;
            $job_application->hs_school_address = $request->hs_school_address;
            $job_application->hs_year_attended = $request->hs_year_attended;
            $job_application->hs_awards = $request->hs_awards;
            $job_application->others_course = $request->others_course;
            $job_application->others_school_name = $request->others_school_name;
            $job_application->others_school_address = $request->others_school_address;
            $job_application->others_year_attended = $request->others_year_attended;
            $job_application->others_awards = $request->others_awards;
            $job_application->licensure_examination = $request->licensure_examination;
            $job_application->rating = $request->rating;
            $job_application->government_examination = $request->government_examination;
            $job_application->gov_rating = $request->gov_rating;
            $job_application->name_of_company = $request->company_name;
            $job_application->address_of_company = $request->company_address;
            $job_application->last_position = $request->last_position;
            $job_application->last_salary = $request->last_salary;
            $job_application->employment_period = $request->employment_period;
            $job_application->company_industry = $request->company_industry;
            $job_application->reason_for_leaving = $request->reason_for_leaving;
            $job_application->applicant_id = auth()->user()->applicant_id;
            $job_application->save();

            if ($request->has('sibling_name'))
            {
                $sibling = SiblingInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->sibling_name as $key=>$sibling_name)
                {
                    $sibling = new SiblingInformation;
                    $sibling->job_application_id = $job_application->id;
                    $sibling->sibling_name = $sibling_name;
                    $sibling->sibling_occupation = $request->sibling_occupation[$key];
                    $sibling->sibling_company_location = $request->sibling_company_location[$key];
                    $sibling->sibling_contact_no = $request->sibling_contact_no[$key];
                    $sibling->save();
                }
            }

            if ($request->has('children_name'))
            {
                $children = ChildrenInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->children_name as $key=>$children_name)
                {
                    $children = new ChildrenInformation;
                    $children->job_application_id = $job_application->id;
                    $children->children_name = $children_name;
                    $children->children_occupation = $request->children_occupation[$key];
                    $children->children_company_location = $request->children_company_location[$key];
                    $children->children_contact_no = $request->children_contact_no[$key];
                    $children->save();
                }
            }

            Alert::success('Successfully Saved')->persistent('Dismiss');
        }
        else
        {
            $job_application->company_id = $request->company_id;
            $job_application->source = $request->source;
            $job_application->employee = $request->employee;
            $job_application->position = $request->position;
            $job_application->minimum_expected_salary = $request->minimum_expected_salary;
            $job_application->date_available_for_employment = $request->date_available_for_employment;
            $job_application->lastname = $request->lastname;
            $job_application->firstname = $request->firstname;
            $job_application->middlename = $request->middlename;
            $job_application->present_house_no = $request->present_house_no;
            $job_application->present_street_name = $request->present_street_name;
            $job_application->present_barangay = $request->present_barangay;
            $job_application->present_municipality = $request->present_municipality;
            $job_application->permanent_house_no = $request->permanent_house_no;
            $job_application->permanent_street_name = $request->permanent_street_name;
            $job_application->permanent_barangay = $request->permanent_barangay;
            $job_application->permanent_municipality = $request->permanent_municipality;
            $job_application->father_name = $request->father_name;
            $job_application->father_occupation = $request->father_occupation;
            $job_application->father_company_location = $request->father_company_location;
            $job_application->father_contact_no = $request->father_contact_no;
            $job_application->mother_name = $request->mother_name;
            $job_application->mother_occupation = $request->mother_occupation;
            $job_application->mother_company_location = $request->mother_company_location;
            $job_application->mother_contact_no = $request->mother_contact_no;
            $job_application->college_course = $request->course;
            $job_application->college_school_name = $request->college_school_name;
            $job_application->college_school_address = $request->college_school_address;
            $job_application->college_year_attended = $request->college_year_attended;
            $job_application->college_awards = $request->college_awards;
            $job_application->hs_course = $request->hs_course;
            $job_application->hs_school_name = $request->hs_school_name;
            $job_application->hs_school_address = $request->hs_school_address;
            $job_application->hs_year_attended = $request->hs_year_attended;
            $job_application->hs_awards = $request->hs_awards;
            $job_application->others_course = $request->others_course;
            $job_application->others_school_name = $request->others_school_name;
            $job_application->others_school_address = $request->others_school_address;
            $job_application->others_year_attended = $request->others_year_attended;
            $job_application->others_awards = $request->others_awards;
            $job_application->licensure_examination = $request->licensure_examination;
            $job_application->rating = $request->rating;
            $job_application->government_examination = $request->government_examination;
            $job_application->gov_rating = $request->gov_rating;
            $job_application->name_of_company = $request->company_name;
            $job_application->last_position = $request->last_position;
            $job_application->last_salary = $request->last_salary;
            $job_application->address_of_company = $request->company_address;
            $job_application->employment_period = $request->employment_period;
            $job_application->company_industry = $request->company_industry;
            $job_application->reason_for_leaving = $request->reason_for_leaving;
            // $job_application->applicant_id = auth()->user()->applicant_id;
            $job_application->save();

            if ($request->has('sibling_name'))
            {
                $sibling = SiblingInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->sibling_name as $key=>$sibling_name)
                {
                    $sibling = new SiblingInformation;
                    $sibling->job_application_id = $job_application->id;
                    $sibling->sibling_name = $sibling_name;
                    $sibling->sibling_occupation = $request->sibling_occupation[$key];
                    $sibling->sibling_company_location = $request->sibling_company_location[$key];
                    $sibling->sibling_contact_no = $request->sibling_contact_no[$key];
                    $sibling->save();
                }
            }

            if ($request->has('children_name'))
            {
                $children = ChildrenInformation::where('job_application_id', $job_application->id)->delete();
                foreach($request->children_name as $key=>$children_name)
                {
                    $children = new ChildrenInformation;
                    $children->job_application_id = $job_application->id;
                    $children->children_name = $children_name;
                    $children->children_occupation = $request->children_occupation[$key];
                    $children->children_company_location = $request->children_company_location[$key];
                    $children->children_contact_no = $request->children_contact_no[$key];
                    $children->save();
                }
            }

            Alert::success('Successfully Updated')->persistent('Dismiss');
        }

        return back();
    }

    public function printJobApplicationForm($id)
    {
        $job_application = JobApplication::findOrFail($id);
        
        $data = [];
        $data['job_application'] = $job_application;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('applicant.print_job_application', $data)->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}

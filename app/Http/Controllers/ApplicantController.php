<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ChildrenInformation;
use App\Document;
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
        $interviewers = User::where('status', 'Active')->get();
        $mrf = ManPowerRequisitionForm::where('mrf_status', 'Approved')->where('progress', 'Open')->get();
        if (auth()->user()->role == "Department Head")
        {
            $applicants = Applicant::whereHas('mrf', function($q) {
                $q->where('department_id', auth()->user()->department_id);
            })->get();
        }

        return view('human_resources.applicant', compact('applicants', 'mrf', 'interviewers'));
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
        $applicant->lastname = $request->lastname;
        $applicant->firstname = $request->firstname;
        $applicant->middlename = $request->middlename;
        $applicant->email = $request->email;
        // $applicant->mobile_number = $request->mobile_number;
        $applicant->man_power_requisition_form_id = $request->mrf_id;
        $applicant->applicant_status = 'Pending';
        
        $attachment = $request->file('resume');
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path('resume'),$name);

        $applicant->resume = '/resume/'.$name;
        $applicant->save();
        
        return back()->with('success', 'Thank you for your submission. Please wait to hear from our talent acquisition team regarding your status.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::with('schedule', 'mrf', 'historyApplicant', 'interviewers', 'applicantDocument')->findOrFail($id);
        $documents = Document::where('document_status', 'Active')->get();
        // $interviewer = Interviewer::where('status', 'Pending')->first();

        return view('human_resources.view_applicant', compact('applicant', 'documents'));
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
        $applicant->lastname = $request->lastname;
        $applicant->firstname = $request->firstname;
        $applicant->middlename = $request->middlename;
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
        // $event->addMeetLink();
        $event->addAttendee([
            'email' => auth()->user()->email
        ]);
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
        $pdf->loadView('human_resources.print_jo', $data)->setPaper('legal', 'portrait');
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

            $nextInterviewer = Interviewer::where('status', 'Waiting')->where('applicant_id', $applicant->id)->orderBy('level', 'asc')->get();
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

                $mrf = ManPowerRequisitionForm::findOrFail($applicant->man_power_requisition_form_id);
                $mrf->progress = 'Serve';
                $mrf->save();

                if ($mrf->progress == 'Serve')
                {
                    $interviewers = Interviewer::where('man_power_requisition_form_id', $mrf->id)
                        ->where(function($query)use($request) {
                            $query->where('status', 'Pending')
                                ->orWhere('status', 'Waiting');
                        })
                        ->get();

                    foreach($interviewers as $key=>$interviewer)
                    {
                        $interviewer->status = 'Cancelled';
                        $interviewer->save();

                        $applicant = Applicant::where('id', $interviewer->applicant_id)->first();
                        $applicant->applicant_status = 'Cancelled';
                        $applicant->save();
                    }
                }

                $password = Str::random(8);
                $name = $applicant->firstname.' '.$applicant->middlename.' '.$applicant->lastname;

                $user = new User;
                $user->name = $name;
                $user->email = $applicant->email;
                $user->password = bcrypt($password);
                $user->status = 'Active';
                $user->role = 'Applicant';
                $user->department_id = $applicant->mrf->department_id;
                $user->company_id = $applicant->mrf->company_id;
                $user->applicant_id = $applicant->id;
                $user->save();

                $applicant->notify(new ApplicantCredentialsNotification($user, $applicant, $password));
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
            $history->position = $applicant->mrf->jobPosition->position;
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

            $nextInterviewer = Interviewer::where('status', 'Waiting')->where('applicant_id', $applicant->id)->orderBy('level', 'asc')->get();
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

    public function interviewer(Request $request, $id)
    {
        if($request->has('interviewer'))
        {
            $interviewer = Interviewer::where('man_power_requisition_form_id', $request->mrf_id)->where('applicant_id', $request->applicant_id)->delete();
            foreach($request->interviewer as $key=>$value)
            {
                $interviewer = new Interviewer;
                $interviewer->man_power_requisition_form_id = $request->mrf_id;
                $interviewer->applicant_id = $request->applicant_id;
                $interviewer->user_id = $value;
                $interviewer->level = $key+1;
                if ($key == 0)
                {
                    $interviewer->status = 'Pending';
                }
                else
                {
                    $interviewer->status = 'Waiting';
                }
                
                $interviewer->save();
            }
    
            Alert::success('Successfully Saved')->persistent('Dismiss');
        }
        else
        {
            Alert::error('Error. Please add interviewer')->persistent('Dismiss');
        }
        return back();
    }

    public function forInterview()
    {
        $interviewers = Interviewer::where('user_id', auth()->user()->id)->where('status', 'Pending')->get();

        return view('human_resources.for_interview', compact('interviewers'));
    }
}

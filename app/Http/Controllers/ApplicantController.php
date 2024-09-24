<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Notifications\NotifyDepartmentHead;
use App\Schedule;
use Carbon\Carbon;
use Google_Client;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

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

        return view('human_resources.applicant', compact('applicants'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);
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
        //
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
        $applicant = Applicant::with('mrf.department.head')->findOrFail($id);

        if ($request->action == "passed")
        {
            $applicant->applicant_status = "Passed";
            $applicant->save();

            $dept_head = $applicant->mrf->department->head;
            $dept_head->notify(new NotifyDepartmentHead($applicant->mrf->position_status));

            Alert::success('The applicant has passed the job interview.')->persistent('Dismiss');
        }
        elseif($request->action == "failed")
        {
            $applicant->applicant_status = "Failed";
            $applicant->save();

            Alert::success('The applicant has failed the job interview.')->persistent('Dismiss');
        }

        return back();
    }
}

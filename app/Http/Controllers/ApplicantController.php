<?php

namespace App\Http\Controllers;

use App\Applicant;
use Carbon\Carbon;
use Google_Client;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;
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
        $event->name = $request->event_name;
        $event->startDateTime = Carbon::parse($request->event_start);
        $event->endDateTime = $event->startDateTime->copy()->addHour();
        $event->googleEvent->colorId = 3;
        $event->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }
}

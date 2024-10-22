<?php

namespace App\Http\Controllers;

use App\JobOffer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $job_offer = JobOffer::where('applicant_id', $request->applicant_id)->first();
        if ($job_offer == null)
        {
            $job_offer = new JobOffer;
            $job_offer->applicant_id = $request->applicant_id;
            $job_offer->immediate_head = $request->immediate_head;
            $job_offer->work_schedule = $request->work_schedule;
            $job_offer->compensation = $request->compensation;
            $job_offer->upon_regularization = $request->upon_regularization;
            $job_offer->others = $request->others;
            $job_offer->start_date = $request->start_date;
            $job_offer->save();

            Alert::success("Successfully Saved")->persistent('Dismiss');
        }
        else
        {
            $this->update($request, $job_offer->id);
        }

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
        //
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
        $job_offer = JobOffer::findOrFail($id);
        $job_offer->applicant_id = $request->applicant_id;
        $job_offer->immediate_head = $request->immediate_head;
        $job_offer->work_schedule = $request->work_schedule;
        $job_offer->compensation = $request->compensation;
        $job_offer->upon_regularization = $request->upon_regularization;
        $job_offer->others = $request->others;
        $job_offer->start_date = $request->start_date;
        $job_offer->save();

        Alert::success("Successfully Updated")->persistent('Dismiss');
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
}

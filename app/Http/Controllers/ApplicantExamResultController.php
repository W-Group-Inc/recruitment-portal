<?php

namespace App\Http\Controllers;

use App\ApplicantExamResult;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantExamResultController extends Controller
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
        $applicant_exam_result = new ApplicantExamResult;
        $applicant_exam_result->mrf_id = $request->mrf_id;
        $applicant_exam_result->applicant_id = $request->applicant_id;
        $applicant_exam_result->critical_thinking = $request->critical_thinking;
        $applicant_exam_result->disc_personality = $request->disc_personality;
        $applicant_exam_result->supervisory_skills = $request->supervisory_skills;
        $applicant_exam_result->managerial_skills = $request->managerial_skills;
        $applicant_exam_result->accounting_skills = $request->accounting_skills;
        $applicant_exam_result->save();

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
        $applicant_exam_result = ApplicantExamResult::findOrFail($id);
        // $applicant_exam_result->mrf_id = $request->mrf_id;
        // $applicant_exam_result->applicant_id = $request->applicant_id;
        $applicant_exam_result->critical_thinking = $request->critical_thinking;
        $applicant_exam_result->disc_personality = $request->disc_personality;
        $applicant_exam_result->supervisory_skills = $request->supervisory_skills;
        $applicant_exam_result->managerial_skills = $request->managerial_skills;
        $applicant_exam_result->accounting_skills = $request->accounting_skills;
        $applicant_exam_result->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
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
}

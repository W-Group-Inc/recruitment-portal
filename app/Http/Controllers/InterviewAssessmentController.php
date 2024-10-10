<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\InterviewAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

class InterviewAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
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
        $interview_assessment = InterviewAssessment::where('applicant_id', $request->applicant_id)->first();

        if ($interview_assessment == null)
        {
            $interview_assessment = new InterviewAssessment;
            $interview_assessment->personal_background = $request->personal_background;
            $interview_assessment->qualification = $request->qualification;
            $interview_assessment->reason_for_transfer = $request->reason_for_transfer;
            $interview_assessment->examination_result = $request->examination_result;
            $interview_assessment->interview_assessment = $request->interview_assessment;
            $interview_assessment->salary_scale = $request->salary_scale;
            $interview_assessment->salary_peers = $request->salary_peers;
            $interview_assessment->current_salary = $request->current_salary;
            $interview_assessment->expected_salary = $request->expected_salary;
            $interview_assessment->recommendation_by_human_resources = $request->recommendation_by_human_resources;
            $interview_assessment->recommendation_hbu = $request->recommendation_hbu;
            $interview_assessment->negotiated_amount = $request->negotiated_amount;
            $interview_assessment->remarks = $request->remarks;
            $interview_assessment->appearance = $request->appearance;
            $interview_assessment->bearing = $request->bearing;
            $interview_assessment->expression = $request->expression;
            $interview_assessment->motivation = $request->motivation;
            $interview_assessment->personality = $request->personality;
            $interview_assessment->job_knowledge = $request->job_knowledge;
            $interview_assessment->hr_strengths = $request->hr_strengths;
            $interview_assessment->hr_areas_of_improvements = $request->hr_areas_of_improvements;
            $interview_assessment->applicant_id = $request->applicant_id;
            $interview_assessment->save();

            Alert::success('Successfully Saved')->persistent('Dismiss');
        }
        else
        {
            $this->update($request, $interview_assessment->id);
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
        $applicant = Applicant::with('interviewAssessment')->findOrFail($id);
        
        return view('human_resources.interview_assessment_form', compact('applicant'));
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
        $interview_assessment = InterviewAssessment::findOrFail($id);
        $interview_assessment->personal_background = $request->personal_background;
        $interview_assessment->qualification = $request->qualification;
        $interview_assessment->reason_for_transfer = $request->reason_for_transfer;
        $interview_assessment->examination_result = $request->examination_result;
        $interview_assessment->interview_assessment = $request->interview_assessment;
        $interview_assessment->salary_scale = $request->salary_scale;
        $interview_assessment->salary_peers = $request->salary_peers;
        $interview_assessment->current_salary = $request->current_salary;
        $interview_assessment->expected_salary = $request->expected_salary;
        $interview_assessment->recommendation_by_human_resources = $request->recommendation_by_human_resources;
        $interview_assessment->recommendation_hbu = $request->recommendation_hbu;
        $interview_assessment->negotiated_amount = $request->negotiated_amount;
        $interview_assessment->remarks = $request->remarks;
        $interview_assessment->appearance = $request->appearance;
        $interview_assessment->bearing = $request->bearing;
        $interview_assessment->expression = $request->expression;
        $interview_assessment->motivation = $request->motivation;
        $interview_assessment->personality = $request->personality;
        $interview_assessment->job_knowledge = $request->job_knowledge;
        $interview_assessment->hr_strengths = $request->hr_strengths;
        $interview_assessment->hr_areas_of_improvements = $request->hr_areas_of_improvements;
        $interview_assessment->applicant_id = $request->applicant_id;
        $interview_assessment->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
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

    public function printInterviewAssessment(Request $request, $id)
    {
        // dd($request->all(), $id);
        $interview_assessment = InterviewAssessment::findOrFail($id);
        $data = [];
        $data['interview_assessment'] = $interview_assessment;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('human_resources.print_interview_assessment', $data)->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}

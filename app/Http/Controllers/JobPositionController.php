<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\JobPosition;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get();
        $departments = Department::get();
        $job_position = JobPosition::with('department', 'company')->get();

        return view('human_resources.job_position', compact('companies', 'departments', 'job_position'));
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
        $job_position = new JobPosition;
        $job_position->company_id = $request->company;
        $job_position->department_id = $request->department;
        $job_position->position = $request->position;
        $job_position->position_summary = $request->position_summary;
        $job_position->duties_and_responsibility = $request->duties_and_responsibility;
        $job_position->approval_authority = $request->approval_authority;
        $job_position->minimum_requirements = $request->minimum_requirements;
        $job_position->save();

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
}

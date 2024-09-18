<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\ManPowerRequisitionForm;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManPowerRequisitionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mrf = ManPowerRequisitionForm::get();
        $companies = Company::where('status', 'Active')->get();
        $departments = Department::where('status', 'Active')->get();
        $employment_status = $this->employmentStatus();
        $job_level = $this->jobLevel();
        
        return view('dept_head.mrf', compact('mrf', 'departments', 'companies', 'employment_status', 'job_level'));
    }

    // public function new()
    // {
    //     $companies = Company::where('status', 'Active')->get();
    //     $departments = Department::where('status', 'Active')->get();

    //     return view('dept_head.new_mrf', compact('companies', 'departments'));
    // }

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
        $mrf = ManPowerRequisitionForm::orderBy('id', 'desc')->first();
        
        $mrfNo = 0;
        $defaultMrfNo = "0724";
        if ($mrf != null)
        {
            $mrfNo = $mrf->mrf_no+1;
        }
        else
        {
            $mrfNo = $defaultMrfNo;
        }
        
        $mrf = new ManPowerRequisitionForm;
        $mrf->mrf_no = $mrfNo;
        $mrf->position_title = $request->position_title;
        $mrf->department_id = $request->department;
        $mrf->company_id = $request->company;
        $mrf->target_date = $request->target_date;
        $mrf->position_status = $request->position_status;
        $mrf->justification = $request->justification;
        if ($request->has('is_plantilla'))
        {
            $mrf->is_plantilla = 1;
        }
        if ($request->has('is_job_description'))
        {
            $mrf->is_job_description = 1;
        }
        $mrf->educational_attainment = $request->educational_attainment;
        $mrf->work_experience = $request->work_experience;
        $mrf->specific_field = $request->specific_field;
        $mrf->special_skills = $request->special_skills;
        $mrf->others = $request->others;
        $mrf->employment_status = $request->employment_status;
        $mrf->job_level = $request->job_level;
        $mrf->salary_range = $request->salary_rate;
        $mrf->other_remarks = $request->other_remarks;
        $mrf->mrf_status = "Pending";
        
        $attachment = $request->file('mrf_attachment');
        $name = time().'-'.$attachment->getClientOriginalName();
        $attachment->move(public_path('mrf_attachments'), $name);
        $file_name = '/mrf_attachments/'.$name;

        $mrf->mrf_attachment = $file_name;
        $mrf->save();

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
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        // $mrf->mrf_no = $mrfNo;
        $mrf->position_title = $request->position_title;
        $mrf->department_id = $request->department;
        $mrf->company_id = $request->company;
        $mrf->target_date = $request->target_date;
        $mrf->position_status = $request->position_status;
        $mrf->justification = $request->justification;
        if ($request->has('is_plantilla'))
        {
            $mrf->is_plantilla = 1;
        }
        if ($request->has('is_job_description'))
        {
            $mrf->is_job_description = 1;
        }
        $mrf->educational_attainment = $request->educational_attainment;
        $mrf->work_experience = $request->work_experience;
        $mrf->specific_field = $request->specific_field;
        $mrf->special_skills = $request->special_skills;
        $mrf->others = $request->others;
        $mrf->employment_status = $request->employment_status;
        $mrf->job_level = $request->job_level;
        $mrf->salary_range = $request->salary_rate;
        $mrf->other_remarks = $request->other_remarks;
        $mrf->mrf_status = "Pending";
        
        if($request->has('mrf_attachment'))
        {
            $attachment = $request->file('mrf_attachment');
            $name = time().'-'.$attachment->getClientOriginalName();
            $attachment->move(public_path('mrf_attachments'), $name);
            $file_name = '/mrf_attachments/'.$name;

            $mrf->mrf_attachment = $file_name;
        }

        $mrf->save();

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
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->delete();

        Alert::success('Successfully Deleted')->persistent('Dismiss');
        return back();
    }

    public function employmentStatus()
    {
        return [
            'Probationary' => 'Probationary',
            'Special Project' => 'Special Project',
            'Contractual' => 'Contractual',
            'Consultant' => 'Consultant'
        ];
    }

    public function jobLevel()
    {
        return [
            'Rank and File' => 'Rank and File',
            'Supervisory' => 'Supervisory',
            'Managerial' => 'Managerial'
        ];
    }
}

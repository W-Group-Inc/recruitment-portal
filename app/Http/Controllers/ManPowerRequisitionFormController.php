<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Interviewer;
use App\JobPosition;
use App\ManPowerRequisitionForm;
use App\MrfApprover;
use App\MrfAttachment;
use App\Notifications\AssignRecruiterNotification;
use App\Notifications\NotifyHrManager;
use App\Notifications\PendingMrfNotification;
use App\User;
use Barryvdh\DomPDF\PDF;
use GuzzleHttp\Client;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $user = User::where('status', 'Active')->get();
        $recruiter = User::where('status', 'Active')->whereIn('role', ['Human Resources', 'Human Resources Manager'])->get();
        $job_positions = JobPosition::where('status', null)->get();
        $get_resigned_employee = file_get_contents(env('WPRO_RESIGNED_EMPLOYEE', 'https://hris.wsystem.online'));
        $resign_employee = json_decode($get_resigned_employee);
        
        return view('dept_head.mrf', compact('mrf', 'departments', 'companies', 'employment_status', 'job_level', 'user', 'job_positions', 'resign_employee', 'recruiter'));
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

        if ($request->job_level == 'Rank and File')
        {
            $target_date = date('Y-m-d', strtotime('+30 days'));
        } 
        elseif ($request->job_level == 'Supervisory' || $request->job_level == 'Managerial')
        {
            $target_date = date('Y-m-d', strtotime('+60 days'));
        }
        
        $mrf = new ManPowerRequisitionForm;
        $mrf->mrf_no = $mrfNo;
        // $mrf->position_title = $request->position_title;
        $mrf->job_position_id = $request->job_position;
        $mrf->department_id = $request->department;
        $mrf->company_id = $request->company;
        $mrf->target_date = $target_date;
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
        if ($request->has('is_resignation_letter'))
        {
            $mrf->is_resignation_letter = 1;
        }
        if ($request->has('replacement'))
        {
            $mrf->resign_employee = $request->replacement;
        }
        $mrf->user_id = auth()->user()->id;
        // dd('no');
        $mrf->educational_attainment = $request->educational_attainment;
        $mrf->work_experience = $request->work_experience;
        $mrf->specific_field = $request->specific_field;
        $mrf->special_skills = $request->special_skills;
        $mrf->others = $request->others;
        $mrf->employment_status = $request->employment_status;
        $mrf->job_level = $request->job_level;
        $mrf->salary_range = $request->salary_rate;
        $mrf->other_remarks = $request->other_remarks;
        // $mrf->recruiter_id = $request->recruiter;
        $mrf->mrf_status = "Pending";
        
        // $mrf_attachment = $request->file('mrf_attachment');
        // foreach($mrf_attachment as $mrf_file)
        // {
        //     $name = time().'-'.$mrf_file->getClientOriginalName();
        //     $mrf_file->move(public_path('mrf_attachments'), $name);
        //     $file_name = '/mrf_attachments/'.$name;

        //     $mrf_attachment = new MrfAttachment;
        //     $mrf_attachment->mrf_id = $mrf->id;
        //     $mrf_attachment->file_path = $file_name;
        //     $mrf_attachment->save();
        // }
        if ($request->has('plantilla_attachment'))
        {
            $file = $request->file('plantilla_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('plantilla_attachment'), $name);
            $file_name = '/plantilla_attachment/'.$name;

            $mrf->plantilla_attachment = $file_name;
        }

        if ($request->has('job_description_attachment'))
        {
            $file = $request->file('job_description_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('job_description_attachment'), $name);
            $file_name = '/job_description_attachment/'.$name;

            $mrf->job_description_attachment = $file_name;
        }

        if ($request->has('resignation_letter_attachment'))
        {
            $file = $request->file('resignation_letter_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('resignation_letter_attachment'), $name);
            $file_name = '/resignation_letter_attachment/'.$name;

            $mrf->resignation_letter_attachment = $file_name;
        }
        
        $mrf->save();

        $user = User::where('role', 'Human Resources Manager')->first();
        $user->notify(new NotifyHrManager($user, $mrf, ""));

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
        // dd($request->all());
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        // $mrf->mrf_no = $mrfNo;
        // $mrf->position_title = $request->position_title;
        $mrf->job_position_id = $request->job_position;
        $mrf->department_id = $request->department;
        $mrf->company_id = $request->company;
        if ($request->job_level == 'Rank and File')
        {
            $target_date = date('Y-m-d', strtotime('+30 days'));
        } 
        elseif ($request->job_level == 'Supervisory' || $request->job_level == 'Managerial')
        {
            $target_date = date('Y-m-d', strtotime('+60 days'));
        }
        $mrf->target_date = $target_date;
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
        if ($request->has('is_resignation_letter'))
        {
            $mrf->is_resignation_letter = 1;
        }
        if ($request->position_status == 'Replacement')
        {
            if ($request->has('replacement'))
            {
                $mrf->resign_employee = $request->replacement;
            }
        }
        else
        {
            $mrf->resign_employee = null;
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
        
        // if($request->has('mrf_attachment'))
        // {
        //     $attachment = $request->file('mrf_attachment');
        //     $name = time().'-'.$attachment->getClientOriginalName();
        //     $attachment->move(public_path('mrf_attachments'), $name);
        //     $file_name = '/mrf_attachments/'.$name;

        //     $mrf->mrf_attachment = $file_name;
        // }

        if ($request->has('plantilla_attachment'))
        {
            $file = $request->file('plantilla_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('plantilla_attachment'), $name);
            $file_name = '/plantilla_attachment/'.$name;

            $mrf->plantilla_attachment = $file_name;
        }

        if ($request->has('job_description_attachment'))
        {
            $file = $request->file('job_description_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('job_description_attachment'), $name);
            $file_name = '/job_description_attachment/'.$name;

            $mrf->job_description_attachment = $file_name;
        }

        if ($request->has('resignation_letter_attachment'))
        {
            $file = $request->file('resignation_letter_attachment');
            $name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('resignation_letter_attachment'), $name);
            $file_name = '/resignation_letter_attachment/'.$name;

            $mrf->resignation_letter_attachment = $file_name;
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
            'Consultant' => 'Consultant',
            'Intern' => 'Intern'
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

    public function print($id)
    {
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $hr_manager = User::where('role', 'Human Resources Manager')->first();
        
        $data = [];
        $data['mrf'] = $mrf;
        $data['hr_manager'] = $hr_manager->name;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('human_resources.print_mrf', $data)->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function progress(Request $request, $id)
    {
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->mrf_status = 'Pending';
        $mrf->progress = null;
        $mrf->save();

        $user = User::where('role', 'Human Resources Manager')->first();
        $user->notify(new NotifyHrManager($user, $mrf, ""));
        
        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }

    public function assign(Request $request, $id)
    {
        // dd($request->all(), $id);
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->recruiter_id = $request->recruiter;
        $mrf->save();

        $user = User::where('id', $request->recruiter)->first();
        $user->notify(new AssignRecruiterNotification($mrf, $user));
        
        // if ($request->recruiter == 23)
        // {
        //     $approvers = [23, 21];
        //     $mrf_approvers = MrfApprover::where('mrf_id', $mrf->id)->delete();
        //     foreach($approvers as $key=>$value)
        //     {
        //         $mrf_approvers = new MrfApprover;
        //         $mrf_approvers->user_id = $value;
        //         $mrf_approvers->mrf_id = $mrf->id;
        //         $mrf_approvers->level = $key+1;
        //         if ($key == 0)
        //         {
        //             $mrf_approvers->status = "Pending";
    
        //             $user = User::where('id', $mrf_approvers->user_id)->first();
        //             $user->notify(new PendingMrfNotification($user));
        //         }
        //         else
        //         {
        //             $mrf_approvers->status = "Waiting";
        //         }
        //         $mrf_approvers->save();
        //     }
        // }
        // else
        // {
        //     $recruiter = collect($request->recruiter);
        //     $approver = [23, 21];
        //     $approvers = $recruiter->concat($approver);
            
        //     $mrf_approvers = MrfApprover::where('mrf_id', $mrf->id)->delete();
        //     foreach($approvers as $key=>$value)
        //     {
        //         $mrf_approvers = new MrfApprover;
        //         $mrf_approvers->user_id = $value;
        //         $mrf_approvers->mrf_id = $mrf->id;
        //         $mrf_approvers->level = $key+1;
        //         if ($key == 0)
        //         {
        //             $mrf_approvers->status = "Pending";
    
        //             $user = User::where('id', $mrf_approvers->user_id)->first();
        //             $user->notify(new PendingMrfNotification($user));
        //         }
        //         else
        //         {
        //             $mrf_approvers->status = "Waiting";
        //         }
        //         $mrf_approvers->save();
        //     }
        // }

        

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    public function cancelMrf(Request $request, $id)
    {
        // dd($id, $request->all());
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->mrf_status = 'Cancelled';
        $mrf->progress = 'Cancelled';
        $mrf->save();

        $user = User::where('role', 'Human Resources Manager')->first();
        $user->notify(new NotifyHrManager($user, $mrf, $request->action));

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    public function cancelledMrf()
    {
        $cancelled_mrf = ManPowerRequisitionForm::where('progress', 'Cancelled')->get();
        
        return view('human_resources.cancelled_mrf', compact('cancelled_mrf'));
    }

    public function rejectedMrf()
    {
        $rejected_mrf = ManPowerRequisitionForm::where('progress', 'Rejected')->get();
        
        return view('human_resources.rejected', compact('rejected_mrf'));
    }

    public function onholdMrf()
    {
        $onhold_mrf = ManPowerRequisitionForm::where('progress', 'Hold')->get();
        
        return view('human_resources.onhold', compact('onhold_mrf'));
    }

    public function servedMrf()
    {
        $served_mrf = ManPowerRequisitionForm::where('progress', 'Served')->get();
        
        return view('human_resources.served', compact('served_mrf'));
    }

    public function assignMrf()
    {
        $assign_mrf = ManPowerRequisitionForm::where('recruiter_id', auth()->user()->id)->get();

        return view('human_resources.assign_mrf', compact('assign_mrf'));
    }

    public function list()
    {
        $mrf_list = ManPowerRequisitionForm::get();

        return view('human_resources.mrf_list', compact('mrf_list'));
    }
}

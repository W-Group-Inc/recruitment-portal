<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Company;
use App\Department;
use App\ManPowerRequisitionForm;
use App\User;
use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "Administrator")
        {
            $user = User::get();
            $department = Department::get();
            $company = Company::get();
            
            return view('home', compact('user', 'department', 'company'));
        }

        if(auth()->user()->role == "Department Head")
        {
            $mrf = ManPowerRequisitionForm::where('department_id', auth()->user()->department_id)->get();

            return view('home', compact('mrf'));
        }

        if(auth()->user()->role == "Human Resources" || auth()->user()->role == "Human Resources Manager")
        {
            // $mrf = ManPowerRequisitionForm::where('mrf_status', '<>' ,'Cancelled')->get();
            $mrf = ManPowerRequisitionForm::get();
            $applicant = Applicant::has('user')->get();
            if (auth()->user()->role == 'Human Resources')
            {
                $applicant = Applicant::has('user')
                    ->whereHas('mrf', function($q){
                        $q->where('recruiter_id', auth()->user()->id);
                    })
                    ->get();
            }
            
            $month = [];
            for ($i=1; $i <= 12; $i++)
            {
                $object = new stdClass;
                $object->total_mrf = ManPowerRequisitionForm::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m', mktime(0,0,0,$i,1,date("Y"))))->where('mrf_status', '<>', 'Cancelled')->count();
                $object->open = ManPowerRequisitionForm::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m', mktime(0,0,0,$i,1,date("Y"))))->where('progress', 'Open')->count();
                $object->serve = ManPowerRequisitionForm::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m', mktime(0,0,0,$i,1,date("Y"))))->where('progress', 'Served')->count();
                $object->reject = ManPowerRequisitionForm::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m', mktime(0,0,0,$i,1,date("Y"))))->where('progress', 'Rejected')->where('mrf_status', 'Rejected')->count();
                $object->m = date('M', mktime(0,0,0,$i,1,date('Y')));

                $month[] = $object;
            }

            // $ats_array = [];
            // foreach($mrf->where('mrf_status', 'Approved')->where('recruiter_id', auth()->user()->id) as $mrf_data)
            // {
            //     $object = new stdClass;
            //     $get_applicant = $mrf_data->applicant;
            //     $object->applicants = $get_applicant;
            //     $ats_array[] = $object;
            // }

            return view('home', compact('mrf', 'applicant', 'month'));
        }
        if(auth()->user()->role == "Applicant")
        {
            return view('home');
        }
    }
}

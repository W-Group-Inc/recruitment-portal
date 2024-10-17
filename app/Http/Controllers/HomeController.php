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

        if(auth()->user()->role == "Human Resources")
        {
            $mrf = ManPowerRequisitionForm::get();
            $applicant = Applicant::get();

            return view('home', compact('mrf', 'applicant'));
        }

    }
}

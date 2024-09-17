<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
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
        }

        return view('home', compact('user', 'department', 'company'));
    }
}

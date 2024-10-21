<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $department = Department::where('status','Active')->get();
        $company = Company::where('status','Active')->get();

        return view('admin.user', compact('users', 'department', 'company'));
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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_id = $request->company;
        $user->department_id = $request->department;
        $user->role = $request->role;
        $user->password = bcrypt("wgroup123");
        $user->status = "Active";
        $user->save();

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
        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->company_id = $request->company;
        $user->department_id = $request->department;
        $user->role = $request->role;
        $user->save();

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

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = "Inactive";
        $user->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = "Active";
        $user->save();

        Alert::success('Successfully Activate')->persistent('Dismiss');
        return back();
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'confirmed|min:6'
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        if ($request->has('is_login'))
        {
            $user->is_login = $request->is_login;
        }
        $user->save();

        Alert::success('Successfully Change Password')->persistent('Dismiss');

        if ($request->route == 'view-password')
        {
            return redirect('/applicants');
        }
        else
        {
            return back();
        }
    }

    public function viewPassword() 
    {
        return view('applicant.change_password');
    }
}

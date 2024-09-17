<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        $company = Company::where('status', 'Active')->get();

        return view('admin.department', compact('departments', 'company'));
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
        $request->validate([
            'code' => 'unique:departments,code'
        ]);

        $department = new Department;
        $department->code = $request->code;
        $department->name = $request->name;
        $department->company_id = $request->company;
        $department->status = 'Active';
        $department->save();

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
        $request->validate([
            'code' => 'unique:departments,code,'.$id
        ]);

        $department = Department::findOrFail($id);
        $department->code = $request->code;
        $department->name = $request->name;
        $department->company_id = $request->company;
        $department->save();

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
        $user = Department::findOrFail($id);
        $user->status = "Inactive";
        $user->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }

    public function activate($id)
    {
        $user = Department::findOrFail($id);
        $user->status = "Active";
        $user->save();

        Alert::success('Successfully Activate')->persistent('Dismiss');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::get();
        
        return view('admin.company', compact('companies'));
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
            'code' => 'unique:companies,code'
        ]);

        $company = new Company;
        $company->code = $request->code;
        $company->name = $request->name;
        $company->status = "Active";
        $company->save();

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
            'code' => 'unique:companies,code,'.$id
        ]);

        $company = Company::findOrFail($id);
        $company->code = $request->code;
        $company->name = $request->name;
        $company->save();

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
        $user = Company::findOrFail($id);
        $user->status = "Inactive";
        $user->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }

    public function activate($id)
    {
        $user = Company::findOrFail($id);
        $user->status = "Active";
        $user->save();

        Alert::success('Successfully Activate')->persistent('Dismiss');
        return back();
    }
}

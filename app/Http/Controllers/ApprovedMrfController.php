<?php

namespace App\Http\Controllers;

use App\ManPowerRequisitionForm;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ApprovedMrfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approved_mrf = ManPowerRequisitionForm::where('mrf_status', 'Approved')->get();
        $recruiter = User::where('status', 'Active')->get();

        return view('human_resources.approved_mrf', compact('approved_mrf', 'recruiter'));
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
        //
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
        // dd($request->all(), $id);
        $file_data = $request->file('upload_approved_mrf');
        $name = time().'_'.$file_data->getClientOriginalName();
        $file_data->move(public_path('approved_mrf'), $name);
        $file_name = '/approved_mrf/'.$name;

        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->mrf_file = $file_name;
        $mrf->save();

        Alert::success('Successfully Uploaded')->persistent('Dismiss');
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
}

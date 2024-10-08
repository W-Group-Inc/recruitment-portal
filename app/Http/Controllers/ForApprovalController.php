<?php

namespace App\Http\Controllers;

use App\ManPowerRequisitionForm;
use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ForApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mrf = ManPowerRequisitionForm::get();

        return view('human_resources.for_approval', compact('mrf'));
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
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        $mrf->mrf_status = $request->action;
        $mrf->approver_remarks = $request->remarks;
        $mrf->save();

        $message = "";
        if ($request->action == "Approved")
        {
            $message = "Successfully Saved";
        }
        elseif($request->action == "Returned")
        {
            $message = "Successfully Returned";
        }
        elseif($request->action == "Rejected")
        {
            $message = "Successfully Rejected";
        }

        Alert::success($message)->persistent('Dismiss');
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

    public function postIndeed($id)
    {
        $mrf = ManPowerRequisitionForm::findOrFail($id);
        dd($mrf);
    }
}

<?php

namespace App\Http\Controllers;

use App\ManPowerRequisitionForm;
use App\MrfApprover;
use App\Notifications\MrfNotification;
use App\Notifications\PendingMrfNotification;
use App\User;
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
        // $mrf = ManPowerRequisitionForm::with('mrfApprovers')->get();
        $mrf_list = [];
        $recruiter = User::whereIn('role', ['Human Resources Manager', 'Human Resources'])->where('status', 'Active')->get();
        if (auth()->user()->role == 'Human Resources Manager')
        {
            $mrf_list = ManPowerRequisitionForm::where('mrf_status', 'Pending')->get();
        }
        // $mrf_approvers = MrfApprover::where('user_id', auth()->user()->id)->where('status', 'Pending')->get();

        return view('human_resources.for_approval', compact('mrf_list', 'recruiter'));
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
        // dd($request->all());
        $mrf = ManPowerRequisitionForm::findOrFail($id);

        $message = "";
        if ($request->action == "Approved")
        {
            $mrf->mrf_status = 'Approved';
            $mrf->progress = 'Open';
            $mrf->recruiter_id = $request->recruiter;
            $mrf->approver_remarks = $request->remarks;
            $mrf->save();

            $message = "Successfully Approved";
        }
        else
        {
            $mrf->mrf_status = $request->action;
            $mrf->progress =  $request->action;
            $mrf->approver_remarks = $request->remarks;
            $mrf->save();

            $message = "Successfully ".$request->action;
        }

        $dept_head = $mrf->department->head;
        $dept_head->notify(new MrfNotification($mrf, $request->action, $dept_head));

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

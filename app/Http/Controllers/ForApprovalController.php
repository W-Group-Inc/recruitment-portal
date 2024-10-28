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
        $mrf_approvers = MrfApprover::where('user_id', auth()->user()->id)->where('status', 'Pending')->get();

        return view('human_resources.for_approval', compact('mrf_approvers'));
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
        $mrf_approver = MrfApprover::findOrFail($id);
        $mrf_approver->status = $request->action;
        $mrf_approver->remarks = $request->remarks;
        $mrf_approver->save();

        $mrf = ManPowerRequisitionForm::findOrFail($mrf_approver->mrf->id);

        $next_approver = MrfApprover::where('mrf_id', $mrf->id)->where('status', 'Waiting')->orderBy('level', 'asc')->get();
        
        $message = "";
        if ($request->action == "Approved")
        {
            if ($next_approver->isNotEmpty())
            {
                foreach($next_approver as $key=>$nextApprover)
                {
                    if ($key == 0)
                    {
                        $nextApprover->status = 'Pending';
                        
                        $user = User::where('id', $nextApprover->user_id)->first();
                        // $user->notify(new PendingMrfNotification($user));
                    }
                    else
                    {
                        $nextApprover->status = 'Waiting';
                    }
    
                    $nextApprover->save();
                }
            }
            else
            {
                $mrf->mrf_status = 'Approved';
                $mrf->progress = 'Open';
                $mrf->save();

                $dept_head = $mrf->department->head;
                // $dept_head->notify(new MrfNotification($mrf, $request->action, $dept_head));
            }

            $message = "Successfully Saved";
        }
        // elseif($request->action == "Returned")
        // {
        //     $message = "Successfully Returned";
        // }
        elseif($request->action == "Rejected")
        {
            foreach($next_approver as $key=>$nextApprover)
            {
                $nextApprover->status = "Rejected";
                $nextApprover->save();
            }

            $mrf->status = 'Rejected';
            $mrf->progress = 'Rejected';
            $mrf->save();

            $message = "Successfully Rejected";
            // $mrf->progress = 'Rejected';
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

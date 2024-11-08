<?php

use App\Applicant;
use App\Interviewer;
use App\ManPowerRequisitionForm;
use App\MrfApprover;
use App\User;

function countMrfForApproval($user)
{
    // $total_count = MrfApprover::where('user_id', $user)->where('status', 'Pending')->count();
    $total_count = ManPowerRequisitionForm::where('mrf_status', 'Pending')->count();
    
    return $total_count;
}

function countForInterview($user)
{
    $total_count = Interviewer::where('user_id', $user)->where('status', 'Pending')->count();

    return $total_count;
}

function checkIfApplicantPass($id)
{
    // dd($id);
    $user_data = User::where('id', $id)->first();
    
    if ($user_data->applicant->applicant_status == 'Passed')
    {
        return true;
    }
    else
    {
        return false;
    }
}
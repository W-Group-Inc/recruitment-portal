<?php

use App\Interviewer;
use App\ManPowerRequisitionForm;
use App\MrfApprover;

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
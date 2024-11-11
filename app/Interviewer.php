<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
    public function mrf()
    {
        return $this->belongsTo(ManPowerRequisitionForm::class,'man_power_requisition_form_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function mrf()
    {
        return $this->belongsTo(ManPowerRequisitionForm::class,'man_power_requisition_form_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MrfApprover extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mrf()
    {
        return $this->belongsTo(ManPowerRequisitionForm::class);
    }
}

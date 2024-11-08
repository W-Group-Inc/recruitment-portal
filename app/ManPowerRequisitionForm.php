<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManPowerRequisitionForm extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function interviewer()
    {
        return $this->hasMany(Interviewer::class);
    }
    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class);
    }
    public function mrfApprovers()
    {
        return $this->hasMany(MrfApprover::class,'mrf_id');
    }
    public function mrfAttachment()
    {
        return $this->hasMany(MrfAttachment::class,'mrf_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewed_by');
    }
}

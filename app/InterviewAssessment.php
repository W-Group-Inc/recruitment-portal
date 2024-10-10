<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewAssessment extends Model
{
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}

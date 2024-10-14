<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryApplicant extends Model
{
    public function interviewer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}

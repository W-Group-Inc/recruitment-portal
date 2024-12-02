<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use Notifiable;

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function mrf()
    {
        return $this->belongsTo(ManPowerRequisitionForm::class,'man_power_requisition_form_id');
    }
    public function jobApplication()
    {
        return $this->hasOne(JobApplication::class,'applicant_id');
    }
    public function historyApplicant()
    {
        return $this->hasMany(HistoryApplicant::class);
    }
    public function interviewAssessment()
    {
        return $this->hasOne(InterviewAssessment::class);
    }
    public function interviewers()
    {
        return $this->hasMany(Interviewer::class);
    }
    public function jobOffer()
    {
        return $this->hasOne(JobOffer::class);
    }
    public function applicantDocument()
    {
        return $this->hasMany(ApplicantDocument::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function examResult()
    {
        return $this->hasOne(ApplicantExamResult::class);
    }
}

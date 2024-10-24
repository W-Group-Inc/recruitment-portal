<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    public function siblingInformation()
    {
        return $this->hasMany(SiblingInformation::class);
    }
    public function childrenInformation()
    {
        return $this->hasMany(ChildrenInformation::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function workExperience()
    {
        return $this->hasMany(WorkExperience::class);
    }
}

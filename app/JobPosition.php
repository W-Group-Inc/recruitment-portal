<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

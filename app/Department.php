<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function head()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

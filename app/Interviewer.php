<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

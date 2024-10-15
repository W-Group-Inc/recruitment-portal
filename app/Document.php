<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function applicantDocument()
    {
        return $this->hasMany(ApplicantDocument::class);
    }
}

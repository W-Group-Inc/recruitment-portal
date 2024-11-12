<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantDocument extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class,'document_id');
    }
}

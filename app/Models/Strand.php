<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $fillable = [
        'strand'
    ];

    public function academic_record(){
        return $this->belongsTo(AcademicRecord::class);
    }
}

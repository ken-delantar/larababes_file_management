<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $fillable = [
        'year_start',
        'year_end',
        'start_of_class',
    ];

    public function academicRecords(){
        return $this->hasMany(AcademicRecord::class, 'school_year_id');
    }
}

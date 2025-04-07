<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'school_year_id',
        'strand_id',
        'section_name',
        'grade_level'
    ];
}

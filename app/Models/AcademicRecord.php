<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicRecord extends Model
{
    protected $fillable = [
        'student_id',
        'strand_id',
        'school_year_id',
        'section_id',
        'year_end_status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class, 'strand_id');
    }

    public function financialRecords(){
        return $this->hasMany(FinancialRecord::class, 'student_id');
    }
}

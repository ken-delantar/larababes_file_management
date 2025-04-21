<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'name',
        'lrn',
        'sex',
        'school_origin',
        'condition',
        'status',
    ];

    public function academicRecords()
    {
        return $this->hasMany(AcademicRecord::class, 'student_id');
    }

    public function latestAcademicRecord()
    {
        return $this->academicRecords()->latest()->first();
    }

    public function financialRecords()
    {
        return $this->hasMany(FinancialRecord::class, 'student_id');
    }

    public function latestFinancialRecord()
    {
        return $this->financialRecords()->latest()->first();
    }

    public function document() {
        return $this->hasOne(Document::class, 'student_id');
    }
}

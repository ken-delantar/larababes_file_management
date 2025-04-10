<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    protected $fillable = [
        'student_id',
        'category',
        'billing_status',
        'vms_billing_status',
        'approved_voucher',
        'payee_fee'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

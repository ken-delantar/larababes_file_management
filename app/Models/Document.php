<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'student_id',
    ];

    public function documentRecords(){
        return $this->hasMany(DocumentRecord::class, 'document_record');
    }
}

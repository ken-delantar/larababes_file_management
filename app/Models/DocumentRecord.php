<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentRecord extends Model
{
    protected $fillable = [
        'document_id',
        'type',
        'docs'
    ];

    public function document(){
        return $this->belongsTo(Document::class, 'document_id');
    }
}

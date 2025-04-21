<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    protected $fillable = [
        'document_id',
        'form_137',
        'form_138',
        'good_moral',
        'psa',
        'pic',
        'esc_certificate',
        'diploma',
        'brgy_certificate',
        'ncae',
        'af_five',
    ];
}

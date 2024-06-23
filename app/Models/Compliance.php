<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    use HasFactory;
    protected $table = 'compliance';
    
    protected $fillable = [
        'title',
        'compliancetext',
        'adr_id',
        'evidence_type_id',
        'ece_number_id',
        'supporting_document_id',
        'supporting_images_id',
        'component_details_id',
        'system_status_id',
        'adr_requirements_id',
    ];
}

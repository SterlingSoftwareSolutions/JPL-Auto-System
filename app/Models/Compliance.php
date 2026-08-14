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
        'vehicle_id',
        'evidence_type_id',
        'ece_number_id',
        'supporting_document_id',
        'supporting_images_id',
        'component_details_id',
        'system_status_id',
        'adr_requirements_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function adr()
    {
        return $this->belongsTo(ADR::class, 'adr_id');
    }

    public function evidenceType()
    {
        return $this->belongsTo(EvidenceType::class, 'evidence_type_id');
    }

    public function eceNumber()
    {
        return $this->belongsTo(EceNumber::class, 'ece_number_id');
    }

    public function supportingDocument()
    {
        return $this->belongsTo(SupportingDocument::class, 'supporting_document_id');
    }

    public function supportingImage()
    {
        return $this->belongsTo(SupportingImage::class, 'supporting_images_id');
    }

    public function componentDetails()
    {
        return $this->belongsTo(ComponentDetail::class, 'component_details_id');
    }

    public function systemStatus()
    {
        return $this->belongsTo(SystemStatus::class, 'system_status_id');
    }
}

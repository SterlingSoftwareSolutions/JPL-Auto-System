<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelReportApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'approval_pathway',
        'rav_entry_reference',
        'approval_date',
        'department_reference',
        'certificate_file_path',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

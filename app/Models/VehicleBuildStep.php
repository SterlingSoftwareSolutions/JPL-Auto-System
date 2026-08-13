<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildStep extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function operation() {
        return $this->belongsTo(VehicleBuildOperation::class, 'vehicle_build_operation_id');
    }
}

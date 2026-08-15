<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildStep extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Ensure image_path is always cast — it stores the master reference photo path
    protected $casts = ['image_path' => 'string'];


    public function operation() {
        return $this->belongsTo(VehicleBuildOperation::class, 'vehicle_build_operation_id');
    }

    public function logs() {
        return $this->hasMany(BuildStepLog::class, 'vehicle_build_step_id');
    }
}

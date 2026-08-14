<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildStepStatus extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function step()
    {
        return $this->belongsTo(VehicleBuildStep::class, 'vehicle_build_step_id');
    }
}

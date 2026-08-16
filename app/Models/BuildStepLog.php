<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildStepLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_model_id',
        'vehicle_build_step_id',
        'is_completed',
        'image_path',
        'completed_by',
        'completed_at'
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function step()
    {
        return $this->belongsTo(VehicleBuildStep::class, 'vehicle_build_step_id');
    }

    public function completedByUser()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }
}

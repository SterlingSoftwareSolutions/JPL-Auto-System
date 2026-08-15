<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'name', 'vin'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function parts()
    {
        return $this->hasMany(VehicleBuildPart::class, 'vehicle_model_id');
    }

    public function timelineTasks()
    {
        return $this->hasMany(VehicleBuildTimelineTask::class, 'vehicle_model_id');
    }

    public function buildStepLogs()
    {
        return $this->hasMany(BuildStepLog::class, 'vehicle_model_id');
    }

    public function buildQcLogs()
    {
        return $this->hasMany(BuildQcLog::class, 'vehicle_model_id');
    }

    public function buildSignoffLogs()
    {
        return $this->hasMany(BuildSignoffLog::class, 'vehicle_model_id');
    }

    public function operationNotes()
    {
        return $this->hasMany(BuildOperationNote::class, 'vehicle_model_id');
    }
}

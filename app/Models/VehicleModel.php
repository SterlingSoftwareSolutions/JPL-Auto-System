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

    public function buildStations()
    {
        return $this->hasMany(VehicleBuildStation::class)->orderBy('order');
    }

    public function parts()
    {
        return $this->hasMany(VehicleBuildPart::class, 'vehicle_model_id');
    }

    public function timelineTasks()
    {
        return $this->hasMany(VehicleBuildTimelineTask::class, 'vehicle_model_id');
    }

    public function buildStepStatuses()
    {
        return $this->hasMany(VehicleBuildStepStatus::class, 'vehicle_model_id');
    }
}

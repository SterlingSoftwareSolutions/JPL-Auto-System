<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildOperation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function station() {
        return $this->belongsTo(VehicleBuildStation::class, 'vehicle_build_station_id');
    }

    public function steps() {
        return $this->hasMany(VehicleBuildStep::class)->orderBy('order');
    }

    public function ppes() {
        return $this->belongsToMany(Ppe::class, 'operation_ppe');
    }

    public function tools() {
        return $this->belongsToMany(Tool::class, 'operation_tool')->withPivot('quantity');
    }

    public function materials() {
        return $this->belongsToMany(Material::class, 'operation_material')->withPivot('quantity');
    }

    public function hazards() {
        return $this->hasMany(OperationHazard::class);
    }

    public function qcChecks() {
        return $this->hasMany(OperationQcCheck::class)->orderBy('order');
    }

    public function signoffs() {
        return $this->hasMany(OperationSignoff::class)->orderBy('order');
    }
}

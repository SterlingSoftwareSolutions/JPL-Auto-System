<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildOperation extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'ppe' => 'array',
        'hazards' => 'array',
        'tools' => 'array',
        'materials' => 'array',
    ];

    public function station() {
        return $this->belongsTo(VehicleBuildStation::class, 'vehicle_build_station_id');
    }

    public function steps() {
        return $this->hasMany(VehicleBuildStep::class)->orderBy('order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildStation extends Model
{
    protected $guarded = [];

    public function vehicleModel() {
        return $this->belongsTo(VehicleModel::class);
    }

    public function operations() {
        return $this->hasMany(VehicleBuildOperation::class)->orderBy('order');
    }
}

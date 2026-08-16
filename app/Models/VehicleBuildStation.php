<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildStation extends Model
{
    protected $guarded = [];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function operations() {
        return $this->hasMany(VehicleBuildOperation::class)->orderBy('order');
    }
}

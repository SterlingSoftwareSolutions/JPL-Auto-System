<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildTimelineTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_model_id',
        'track',
        'phase',
        'label',
        'cost',
        'start',
        'dur'
    ];
}

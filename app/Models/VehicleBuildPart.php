<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBuildPart extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_model_id',
        'category',
        'component',
        'description',
        'part_number',
        'price',
        'supplier',
        'status',
    ];

    public function build()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }
}

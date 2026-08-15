<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationHazard extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_build_operation_id', 'hazard', 'control'];

    public function operation()
    {
        return $this->belongsTo(VehicleBuildOperation::class, 'vehicle_build_operation_id');
    }
}

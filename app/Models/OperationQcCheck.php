<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationQcCheck extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_build_operation_id', 'specification', 'expected_value', 'order', 'after_step'];

    public function operation()
    {
        return $this->belongsTo(VehicleBuildOperation::class, 'vehicle_build_operation_id');
    }
}

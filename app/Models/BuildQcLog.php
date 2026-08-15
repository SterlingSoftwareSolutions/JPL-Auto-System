<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildQcLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_model_id',
        'operation_qc_check_id',
        'status',
        'notes',
        'logged_by',
        'logged_at'
    ];

    protected $casts = [
        'logged_at' => 'datetime'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function qcCheck()
    {
        return $this->belongsTo(OperationQcCheck::class, 'operation_qc_check_id');
    }

    public function loggedByUser()
    {
        return $this->belongsTo(User::class, 'logged_by');
    }
}

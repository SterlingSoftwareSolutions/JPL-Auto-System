<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildSignoffLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_model_id',
        'operation_signoff_id',
        'signed_by',
        'signature_data',
        'signed_at'
    ];

    protected $casts = [
        'signed_at' => 'datetime'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function signoff()
    {
        return $this->belongsTo(OperationSignoff::class, 'operation_signoff_id');
    }

    public function signedByUser()
    {
        return $this->belongsTo(User::class, 'signed_by');
    }
}

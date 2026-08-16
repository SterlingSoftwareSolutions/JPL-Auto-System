<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildOperationNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_model_id',
        'vehicle_build_operation_id',
        'diagram_image_path',
        'notes',
        'logged_by',
    ];

    /**
     * The master vehicle this note belongs to.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * The specific physical build this note belongs to.
     */
    public function build()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    /**
     * The master operation this note is attached to.
     */
    public function operation()
    {
        return $this->belongsTo(VehicleBuildOperation::class, 'vehicle_build_operation_id');
    }

    /**
     * The user who last updated this note.
     */
    public function loggedBy()
    {
        return $this->belongsTo(User::class, 'logged_by');
    }
}

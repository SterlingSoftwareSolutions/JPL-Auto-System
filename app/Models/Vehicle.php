<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'make',
        'model',
        'year',
        'image_path',
        'description',
    ];

    public function parts()
    {
        return $this->hasMany(Part::class, 'vehicle_id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }

    public function builds()
    {
        return $this->hasMany(VehicleModel::class, 'vehicle_id');
    }

    public function compliances()
    {
        return $this->hasMany(Compliance::class, 'vehicle_id');
    }

    public function modelReportApprovals()
    {
        return $this->hasMany(ModelReportApproval::class);
    }

    public function buildStations()
    {
        return $this->hasMany(VehicleBuildStation::class)->orderBy('order');
    }
}

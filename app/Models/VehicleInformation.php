<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInformation extends Model
{
    protected $table = 'vehicle_information';
    protected $fillable = ['vehicle_id', 'item_number', 'label', 'variant1', 'variant2'];
}

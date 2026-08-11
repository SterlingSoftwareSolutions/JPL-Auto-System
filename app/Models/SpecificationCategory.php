<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationCategory extends Model
{
    protected $fillable = ['name'];

    public function specifications()
    {
        return $this->hasMany(VehicleSpecification::class, 'category_id');
    }
}

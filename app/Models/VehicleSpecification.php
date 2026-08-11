<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSpecification extends Model
{
    protected $fillable = ['category_id', 'description', 'value'];

    public function category()
    {
        return $this->belongsTo(SpecificationCategory::class, 'category_id');
    }
}

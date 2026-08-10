<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'category_id',
        'component_id',
        'part_number',
        'price',
        'supplier_id',
        'upload_part_image',
    ];

    public function category()
    {
        return $this->belongsTo(PartCategory::class, 'category_id');
    }

    public function component()
    {
        return $this->belongsTo(PartComponent::class, 'component_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
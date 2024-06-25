<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartComponent extends Model
{
    use HasFactory;

    protected $fillable = ['component_name'];

    public function parts()
    {
        return $this->hasMany(Part::class, 'component_id');
    }
}


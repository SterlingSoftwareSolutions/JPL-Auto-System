<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    use HasFactory;


    protected $fillable = ['category_name'];

    public function parts()
    {
        return $this->hasMany(Part::class, 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportingImages extends Model
{
    use HasFactory;

    protected $table = 'supporting_images';

    protected $fillable = ['image'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'track', 'phase', 'label', 'cost', 'start', 'dur'
    ];
}

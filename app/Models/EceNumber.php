<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EceNumber extends Model
{
    use HasFactory;

    protected $table = 'ece_number';

    protected $fillable = [
        'number'
    ];
}

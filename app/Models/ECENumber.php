<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECENumber extends Model
{
    use HasFactory;

    protected $table = 'ece_number';

    protected $fillable = ['number'];
}

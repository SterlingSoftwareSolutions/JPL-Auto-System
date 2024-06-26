<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADRRequirments extends Model
{
    use HasFactory;

    protected $table = 'adr_requirments';

    protected $fillable = ['required'];
    
}

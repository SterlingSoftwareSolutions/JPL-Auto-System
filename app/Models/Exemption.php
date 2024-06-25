<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exemption extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function adrs()
    {
        return $this->hasMany(ADR::class, 'exemption_id');
    }
}

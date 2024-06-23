<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADR extends Model
{
    use HasFactory;

    protected $table = 'adr';

    protected $fillable = [
        'adrtext',
        'title',
        'compliancetext',
    ];

    public function compliance()
    {
        return $this->hasMany(Compliance::class);
    }
}

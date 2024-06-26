<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentsDetails extends Model
{
    use HasFactory;

    protected $table = 'components_details';

    protected $fillable = [
        'component',
        'type',
        'part',
        'qty'
    ];
}

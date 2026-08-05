<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportingDocuments extends Model
{
    use HasFactory;

    protected $table = 'supporting_documents';

    protected $fillable = ['document'];
    
}

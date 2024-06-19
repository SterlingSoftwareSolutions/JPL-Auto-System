<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'upload_image',
        'business_name',
        'business_web',
        'county',
        'contact_name',
        'phone',
        'email',
        'trade_account',
        'trade_agreement_pdf',
        'supplier_crm',
        'crm_url',
        'crm_username',
        'crm_password'
    ];

}

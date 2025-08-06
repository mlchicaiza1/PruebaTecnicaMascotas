<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dental extends Model
{
    protected $fillable = [
        'contract_id',
        'start_date',
        'end_date',
        'contractor_id',
        'insured_name',
        'identification',
        'affiliate_type_id',
        'family_composition_id',
        'service_id',
        'holder_id',
        'dependents',
        'registration_code',
    ];

     protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'dependents' => 'array',
    ];
}

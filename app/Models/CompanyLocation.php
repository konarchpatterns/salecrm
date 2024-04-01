<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id', 'country_id','state_id','city_id','block','street','address','zip','timezone'
    ];

}

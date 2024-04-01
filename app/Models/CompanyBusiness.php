<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id', 'type','description'
    ];
}

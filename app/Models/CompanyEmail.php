<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id', 'email','type'
    ];
}

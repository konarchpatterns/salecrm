<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'company_id','assign_by'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients_phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'clients_id', 'phone','type'
    ];
}

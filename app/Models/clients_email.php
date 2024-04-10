<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients_email extends Model
{
    use HasFactory;
    protected $fillable = [
        'clients_id', 'mail','type'
    ];
}

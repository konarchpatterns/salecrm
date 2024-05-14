<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start_date', 'end_date', 'start_time', 'end_time', 'discription', 'priority', 'created_by', 'updated_by'];
}

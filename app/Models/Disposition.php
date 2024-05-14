<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'company_id','timezone','phone','status','description',
        'followup_date','followup_time','start_time','end_time','total_time'
    ];

}

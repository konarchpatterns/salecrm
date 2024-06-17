<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Disposition extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'company_id','client_id','timezone','phone','status','description',
        'followup_date','followup_time','start_time','end_time','total_time'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'user_id', 'company_id','timezone','phone','status','description',
            'followup_date','followup_time','start_time','end_time','total_time'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CompanyBusiness extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'company_id', 'type','description','business_type'
    ];

    Public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'company_id', 'type','description'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}")->logOnlyDirty();
        // Chain fluent methods for configuration options
    }
}

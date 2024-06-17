<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CompanyPhone extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'company_id', 'phone','type'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'company_id', 'phone','type'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }
    
}

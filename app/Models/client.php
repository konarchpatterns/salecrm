<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class client extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'fname', 'lname','designation','companyId', 'linkdinurl'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'fname', 'lname','designation','companyId', 'linkdinurl'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }
}

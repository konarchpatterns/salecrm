<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'name', 'state_id'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'name', 'state_id'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }
}

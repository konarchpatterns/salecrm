<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class clients_email extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'clients_id', 'mail','type'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'clients_id', 'mail','type'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }
}

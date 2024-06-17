<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Booking extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = ['title', 'start_date', 'end_date', 'start_time', 'end_time', 'discription', 'priority', 'created_by', 'updated_by', 'company_id', 'client_id'];
    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly(['title', 'start_date', 'end_date', 'start_time', 'end_time', 'discription', 'priority', 'created_by', 'updated_by', 'company_id', 'client_id'])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}");
        // Chain fluent methods for configuration options
    }
}

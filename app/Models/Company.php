<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Company extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'name', 'fax','website','converted','create_user_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        $userName = Auth::user();
        return LogOptions::defaults()
        ->logOnly([
            'name', 'fax','website','assign_by','assign_to','assign','converted','create_user_id'
        ])->setDescriptionForEvent(fn(string $eventName) => "{$userName->name} has {$eventName}")->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    // public static function findByIdWithLogging($id)
    // {
    //     // Retrieve the company by the passed URL parameter
    //     $company = self::findOrFail($id);

    //     // You can add additional logging or other logic here if needed
    //     activity()
    //         ->performedOn($company)
    //         ->causedBy(Auth::user())
    //         ->log("Company with ID {$id} was accessed");

    //     return $company;
    // }
}

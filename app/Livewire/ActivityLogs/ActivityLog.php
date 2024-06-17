<?php

namespace App\Livewire\ActivityLogs;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLog extends Component
{
    use WithPagination;

    public function render()
    {
        $activity = DB::table('activity_log as a')->select('a.id', 'a.description', 'a.subject_type', 'a.event', 'a.subject_id', 'a.properties', 'a.created_at', 'u.name' )->leftJoin('users as u', 'u.id', '=', 'a.causer_id')
        ->paginate(10);
        return view('livewire.activity-logs.activity-log', compact('activity'));
    }
}

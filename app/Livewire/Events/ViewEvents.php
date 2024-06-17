<?php

namespace App\Livewire\Events;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class ViewEvents extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        $events = Booking::select('id','title', 'discription', 'priority', 'start_date', 'end_date')
        ->where("title", 'like', '%' . $this->search . '%')
        ->orWhere('priority', 'like', '%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.events.view-events', compact('events'));
    }
}

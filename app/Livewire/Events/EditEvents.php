<?php

namespace App\Livewire\Events;

use App\Models\Booking;
use Livewire\Component;

class EditEvents extends Component
{
    public $data;
    public $title;
    public $description;
    public $priority;
    public $start_date;
    public $company_id;
    public function mount($data){
        $this->title = $data->title;
        $this->description = $data->discription;
        $this->priority = $data->priority;
        $this->start_date = $data->start_date;
        $this->company_id = $data->company_id;
    }
    public function render()
    {
        // $companies = Company::select('id', 'name')->get();
        return view('livewire.events.edit-events');
    }
    public function update(){
        Booking::where('id','=',$this->data->id)
        ->update([
            'title' => $this->title,
            'discription' => $this->description,
            'priority' => $this->priority,
            'start_date' => $this->start_date,
            'end_date' => $this->start_date
        ]);
    }
}

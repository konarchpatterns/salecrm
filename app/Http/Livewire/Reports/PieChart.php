<?php

namespace App\Http\Livewire\Reports;

use App\Models\Disposition;
use Livewire\Component;

class PieChart extends Component
{
    public $date = "2024-01-01";
    public $user_id;
    public function render()
    {
        $countByStatus = Disposition::where('user_id', $this->user_id)
        ->selectRaw('COUNT(id) as count, status')
        ->groupBy('status')
        ->get();
        return view('livewire.reports.pie-chart', ["countByStatus"=>$countByStatus, "date"=>$this->date]);
    }
   
}

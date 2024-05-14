<?php

namespace App\Http\Livewire\Reports;

use App\Models\Disposition;
use Livewire\Component;

class BarGraph extends Component
{
    public $user_id;
    public $dt = '2024-05-01';
    public function render()
    {
        $dispositonCount = [
            "Doesn't Qualify"=>0,
            "Sale"=>0,
            "No Answer"=>0,
            "Answering Machine"=>0,
            "Hang Up"=>0,
            "Disconnected Number"=>0,
            "Not Interested"=>0,
            "Wrong Number"=>0,
            "Number Not In Service"=>0,
            "Interested"=>0,
            "Follow Up"=>0,
            "Busy Number"=>0,
            "Call Back"=>0,
            "Cancel"=>0,
            "Authority Not Available"=>0,
            "Do Not Call"=>0,
            "In House"=>0,
            "Already Client"=>0,
        ];
            $results = Disposition::select('id', 'status')
            ->where('user_id', '=', $this->user_id)
            ->whereDate('created_at', '>=', $this->dt)
            ->get();
        
        foreach($results as $result){
            if($result->status == "Doesn't Qualify"){
                $dispositonCount["Doesn't Qualify"] += 1;
            }elseif($result->status == "Sale"){
                $dispositonCount["Sale"] += 1;
            }
            elseif($result->status == "No Answer"){
                $dispositonCount["No Answer"] += 1;
            }
            elseif($result->status == "Answering Machine"){
                $dispositonCount["Answering Machine"] += 1;
            }
            elseif($result->status == "Hang Up"){
                $dispositonCount["Hang Up"] += 1;
            }
            elseif($result->status == "Disconnected Number"){
                $dispositonCount["Disconnected Number"] += 1;
            }
            elseif($result->status == "Not Interested"){
                $dispositonCount["Not Interested"] += 1;
            }
            elseif($result->status == "Wrong Number"){
                $dispositonCount["Wrong Number"] += 1;
            }
            elseif($result->status == "Number Not In Service"){
                $dispositonCount["Number Not In Service"] += 1;
            }
            elseif($result->status == "Interested"){
                $dispositonCount["Interested"] += 1;
            }
            elseif($result->status == "Follow Up"){
                $dispositonCount["Follow Up"] += 1;
            }
            elseif($result->status == "Busy Number"){
                $dispositonCount["Busy Number"] += 1;
            }
            elseif($result->status == "Call Back"){
                $dispositonCount["Call Back"] += 1;
            }
            elseif($result->status == "Cancel"){
                $dispositonCount["Cancel"] += 1;
            }
            elseif($result->status == "Authority Not Available"){
                $dispositonCount["Authority Not Available"] += 1;
            }
            elseif($result->status == "Do Not Call"){
                $dispositonCount["Do Not Call"] += 1;
            }
            elseif($result->status == "In House"){
                $dispositonCount["In House"] += 1;
            }
            elseif($result->status == "Already Client"){
                $dispositonCount["Already Client"] += 1;
            }
        }
        return view('livewire.reports.bar-graph',["dispositonCount"=>$dispositonCount]);
    }
}

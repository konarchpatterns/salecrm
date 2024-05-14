<?php

namespace App\Http\Livewire\Reports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ActiveUsers extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $bdeActiveUsers = 
        DB::table('users as u')
        ->select('u.id', 'u.name', DB::raw('COUNT(DISTINCT companies.id) as     company_count'), DB::raw('COUNT(DISTINCT dispositions.id) as    dispositions_count'))
        ->leftJoin('companies', 'u.id', '=', 'companies.assign_to')
        ->leftJoin('dispositions', 'u.id', '=', 'dispositions.user_id')
        ->where('u.designation', '=', 9)
        ->where('flag','=',0)
        ->where('u.name', 'like', '%' . $this->search . '%')
        ->groupBy('u.id', 'u.name')
        ->paginate(8);

        return view('livewire.reports.active-users', ['bdeActiveUsers' => $bdeActiveUsers]);
    }
}

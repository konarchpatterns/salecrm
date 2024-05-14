<?php

namespace App\Http\Livewire\Reports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class InActiveUsers extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $bdeInActiveUsers = 
        DB::table('users as u')
        ->select('u.id', 'u.name', DB::raw('COUNT(companies.id) as company_count'), DB::raw('COUNT(dispositions.id) as dispositions_count'))
        ->leftJoin('companies', 'u.id', '=', 'companies.assign_to')
        ->leftJoin('dispositions', 'u.id', '=', 'dispositions.user_id')
        ->where('u.designation', '=', 9)
        ->where('flag','=',1)
        ->where('u.name', 'like', '%' . $this->search . '%')
        ->groupBy('u.id', 'u.name')
        ->paginate(8);
        return view('livewire.reports.in-active-users', ['bdeInActiveUsers'=>$bdeInActiveUsers]);
    }
}

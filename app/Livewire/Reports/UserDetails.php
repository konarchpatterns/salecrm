<?php

namespace App\Livewire\Reports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserDetails extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $bdeUsers = DB::table('users as u')
            ->select('u.id', 'u.name', DB::raw('COUNT(companies.id) as company_count'))
            ->leftJoin('companies', 'u.id', '=', 'companies.assign_to')
            ->where('u.designation', '=', 9)
            ->where('u.name', 'like', '%' . $this->search . '%')
            ->groupBy('u.id', 'u.name')
            ->paginate(8);
        return view('livewire.reports.user-details', ["bdeUsers" => $bdeUsers]);
    }
}

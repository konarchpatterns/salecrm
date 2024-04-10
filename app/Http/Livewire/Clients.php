<?php

namespace App\Http\Livewire;

use App\Models\client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;
    public $selectedUserId;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
         $clients = DB::table('clients as e')
                   ->select('e.id','e.fname', 'e.lname', 'e.designation','e.companyId', 'e.linkdinurl',
                   'companies.name as cname')
                   ->leftJoin('companies', 'e.companyId', '=', 'companies.id')
                   ->where('e.fname', 'like', '%' . $this->search . '%')
                   ->orWhere('e.lname', 'like', '%' . $this->search . '%')
                   ->orWhere('e.designation', 'like', '%' . $this->search . '%')
                   ->paginate(10);


        return view('livewire.clients', ['clients' => $clients]);
    }
}

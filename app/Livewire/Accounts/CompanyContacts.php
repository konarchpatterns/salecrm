<?php

namespace App\Livewire\Accounts;

use App\Models\client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompanyContacts extends Component
{
    public $companyId;
    public function render()
    {
        $contacts = client::select(
            'clients.id',
            DB::raw('MAX(clients.fname) as fname'),
            DB::raw('MAX(clients.lname) as lname'),
            DB::raw('MAX(clients.designation) as designation'),
            DB::raw('GROUP_CONCAT(clients_phones.phone) as phones'),
            DB::raw('GROUP_CONCAT(clients_emails.mail) as emails')
        )
            ->leftJoin('clients_phones', 'clients.id', '=', 'clients_phones.clients_id')
            ->leftJoin('clients_emails', 'clients.id', '=', 'clients_emails.clients_id')
            ->where('companyId', '=', $this->companyId)
            ->groupBy('clients.id')
            ->get();
        return view('livewire.accounts.company-contacts', compact('contacts'));
    }
}

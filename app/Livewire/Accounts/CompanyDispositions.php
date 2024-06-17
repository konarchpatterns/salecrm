<?php

namespace App\Livewire\Accounts;

use App\Models\Disposition;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyDispositions extends Component
{
    use WithPagination;
    public $companyId;
    public $search;
    public function render()
    {
        $dispositions = Disposition::select('users.name', 'dispositions.phone', 'dispositions.status', 'dispositions.description', 'dispositions.followup_date', 'dispositions.followup_time', 'dispositions.timezone')->leftjoin('users', 'dispositions.user_id', '=', 'users.id')
            ->where('company_id', '=', $this->companyId)
            ->where(function($query){
                $query->where('users.name', 'like', '%' . $this->search . '%')
                ->orWhere('dispositions.phone', 'like', '%' . $this->search . '%')
                ->orWhere('dispositions.status', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view(
            'livewire.accounts.company-dispositions',
            compact('dispositions')
        );
    }
}

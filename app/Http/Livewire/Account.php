<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Account extends Component
{
    use WithPagination;

    public $selectedUserId;
    public $search = '';

    protected $paginationTheme = 'tailwind'; // Optional: if you want to use Bootstrap styling for pagination
    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        // Updated query with search condition
         $account = DB::table('companies as e')
         ->select('e.id', 'e.name', 'e.website', 'e.fax'
         , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
         , DB::raw('GROUP_CONCAT(states.name) as stname')
         , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
          DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
         DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
         DB::raw('GROUP_CONCAT(company_phones.phone) as clpp'),
         DB::raw('GROUP_CONCAT(clients_phones.phone) as clp'))
         ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
         ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
         ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
         ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
         ->leftJoin('states', 'states.id','=','company_locations.state_id')
         ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
         ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
        ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
         ->where('e.name', 'like', '%' . $this->search . '%') // Search condition
         ->orWhere('e.website', 'like', '%' . $this->search . '%')
         ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
         ->orWhere('countries.name', 'like', '%' . $this->search . '%')
         ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
         ->orWhere('states.name', 'like', '%' . $this->search . '%')
         ->orWhere('cities.name', 'like', '%' . $this->search . '%')
         ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
         ->orWhere('clients_phones.phone', 'like', '%' . $this->search . '%') // You can add more conditions to search in other fields
         ->groupBy('e.id', 'e.name', 'e.website', 'e.fax')

         ->paginate(10);
        //            ->leftJoin('companies as m', 'e.assign_by', '=', 'm.id')
        //            ->select('e.id', 'e.name as EmployeeName', 'e.email', 'm.name as AssignedBy')
        //            ->where('e.name', 'like', '%' . $this->search . '%') // Search condition
        //            ->orWhere('e.email', 'like', '%' . $this->search . '%') // You can add more conditions to search in other fields
        //            ->paginate(15);
        return view('livewire.account', ['account' => $account]);
    }


    public function export()
    {
        $filename = "users_export.csv";
        $users = DB::table('users as e')
                    ->leftJoin('users as m', 'e.assign_by', '=', 'm.id')
                    ->select('e.id', 'e.name as EmployeeName', 'e.email', 'm.name as AssignedBy')
                    ->where('e.name', 'like', '%' . $this->search . '%')
                    ->orWhere('e.email', 'like', '%' . $this->search . '%')
                    ->get();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('ID', 'Employee Name', 'Email', 'Assigned By');

        $callback = function() use ($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                $row = array(
                    $user->id,
                    $user->EmployeeName,
                    $user->email,
                    $user->AssignedBy
                );

                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
//     public function viewUser($userId)
// {
//     // Handle the action, e.g., redirecting to a user detail page
//     return redirect()->to('/users/'.$userId.'/edit/');
// }



// public function confirmDelete($userId)
// {
//     $this->selectedUserId = $userId;
//     $this->dispatchBrowserEvent('openDeleteModal');
// }

// public function deleteDatas($id)
// {

//     // Delete the user
//     DB::table('users')->where('id', $id)->delete();

//     // Close the modal
//     $this->dispatchBrowserEvent('closeDeleteModal');
// }



}

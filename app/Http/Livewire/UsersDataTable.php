<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersDataTable extends Component
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
        $users = DB::table('users as e')
                   ->leftJoin('users as m', 'e.assign_by', '=', 'm.id')
                   ->select('e.id', 'e.name as EmployeeName', 'e.email', 'm.name as AssignedBy')
                   ->where('e.name', 'like', '%' . $this->search . '%') // Search condition
                   ->orWhere('e.email', 'like', '%' . $this->search . '%') // You can add more conditions to search in other fields
                   ->paginate(15);

        return view('livewire.users-data-table', ['users' => $users]);
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
    public function viewUser($userId)
{
    // Handle the action, e.g., redirecting to a user detail page
    return redirect()->to('/users/'.$userId.'/edit/');
}



public function confirmDelete($userId)
{
    $this->selectedUserId = $userId;
    $this->dispatchBrowserEvent('openDeleteModal');
}

public function deleteDatas($id)
{

    // Delete the user
    DB::table('users')->where('id', $id)->delete();

    // Close the modal
    $this->dispatchBrowserEvent('closeDeleteModal');
}

}

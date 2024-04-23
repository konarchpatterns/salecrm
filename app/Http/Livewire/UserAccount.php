<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Disposition;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Session;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Useraccount extends Component
{
    use WithPagination;

    public $selectedUserId;
    public $search = '';

    protected $paginationTheme = 'tailwind'; // Optional: if you want to use Bootstrap styling for pagination

    public $isOpen = false;
    public $isOpennew = false;
    public $isOpentime = false;
    public $isOpenhistory = false;
    public $refreshtoken = false;
    public $modalData = '';
    public $companymodalData = '';
    public $company_id = '';
    public $dispo_message;
    public $disposition_timezone;
    public $disposition_time;
    public $disposition_date;
    public $disposition_status;
    public function openHistory()
    {

        $this->isOpenhistory = true;
        $this->isOpennew = false;
        $this->refreshtoken = true;
        // $this->dispositionHistory=Disposition::select('dispositions.id','dispositions.phone','dispositions.status',
        // 'dispositions.timezone','dispositions.created_at','dispositions.followup_date',
        // 'dispositions.followup_time','dispositions.description','users.name')
        // ->join('users','users.id','=','dispositions.user_id')
        // ->where('company_id',$this->company_id )->orderBy('dispositions.id','desc')->get();

        $this->dispositionHistory=DB::table('dispositions')
        ->select(
            'dispositions.id',
            'dispositions.phone',
            'dispositions.status',
            'dispositions.timezone',
            'dispositions.created_at',
            'dispositions.followup_date',
            'dispositions.followup_time',
            'dispositions.description',
            'users.name',
            'clients.fname'
        )
        ->join('users', function ($join) {
            $join->on('users.id', '=', 'dispositions.user_id');
             //    ->whereRaw('users.id collation_connection = dispositions.user_id collation_connection');
        })
        ->leftJoin('clients_phones', function ($join) {
            $join->on(DB::raw('clients_phones.phone collate utf8mb4_unicode_ci'), '=', DB::raw('dispositions.phone collate utf8mb4_unicode_ci'));


           })
           ->leftjoin('clients', 'clients.id', '=', 'clients_phones.clients_id')
           ->leftjoin('company_phones', 'company_phones.phone', '=', 'dispositions.phone')

        ->where('dispositions.company_id',$this->company_id)->orderBy('dispositions.id','desc')->get();
    }

    public function closeHistory()
    {

        $this->isOpenhistory = false;
        $this->isOpennew = true;
    }
    public function openModal($mobile,$company,$companyid)
    {
        $this->modalData = $mobile;
        $this->companymodalData = $company;
        $this->company_id = $companyid;
        $this->isOpen = true;
        $this->refreshtoken = true;
        Session::put('tmpcompanyid', $this->company_id);
            Session::put('tmpphone', $this->modalData);
    }
    public function opennewModal()
    {

        $this->isOpen = false;
        $this->isOpennew = true;
        $this->refreshtoken = true;
    }

    public function opentimedata()
    {

        if($this->disposition_status=="Follow Up")
        {
            $this->isOpentime = true;
            }
        elseif ($this->disposition_status=="Interested") {
            $this->isOpentime = true;
        }
        elseif ($this->disposition_status=="Call Back") {
            $this->isOpentime = true;
        }
        else{
            $this->isOpentime = false;
        }

    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->refreshtoken = false;
    }
    protected $rules = [
        'disposition_status' => 'required'
    ];
    public function disposubmission()
    {
        if($this->disposition_status=="Follow Up")
        {
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'

            ];
            }
        elseif ($this->disposition_status=="Interested") {
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'

            ];
        }
        elseif ($this->disposition_status=="Call Back") {
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'

            ];

        }
        else{
            $this->disposition_date=null;
            $this->disposition_timezone=null;

        }
        $this->validate();
        $insert=Disposition::create([
            'user_id'=>Auth::id(),
            'company_id'=>$this->company_id,
            'description'=>$this->dispo_message,
            'status'=>$this->disposition_status,
            'followup_date'=>$this->disposition_date,
            'followup_time'=>$this->disposition_time,
            'timezone'=>$this->disposition_timezone,
            'phone'=>$this->modalData
        ]);
        if($insert){


            $userdetail=User::find(Auth::id());
            flash()->addSuccess("thanks ".$userdetail->name." for submitting disposition for ".$this->companymodalData."");
            $this->isOpennew = false;
        }
        else{

            flash()->addError("disposition submission failed");
        }


    }

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
        // ->where('e.assign_to', '=',Auth::id())
        ->where([['e.name', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]]) // Search condition
        ->orWhere([['e.website', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['company_phones.phone', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['countries.name', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['countries.shortname', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['states.name', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['cities.name', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['company_emails.email', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
        ->orWhere([['clients_phones.phone', 'like', '%' . $this->search . '%'],['e.assign_to', '=',Auth::id()]])
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
public function mount()
{
    // Session::put('tmpcompanyid', "");
    // Session::put('tmpphone',"");
    $this->refreshPage();

}
public function refreshPage()
    {
  if(!empty(Session::get('tmpphone'))) {
        $insert=Disposition::create([
            'user_id'=>Auth::id(),
            'status'=>"browser refresh",
            'phone'=>Session::get('tmpphone'),
            'company_id'=>Session::get('tmpcompanyid')
        ]);
    }

    }


    public function refreshPagecloed()
    {
  if(!empty(Session::get('tmpphone'))) {
        $insert=Disposition::create([
            'user_id'=>Auth::id(),
            'status'=>"browser closed",
            'phone'=>Session::get('tmpphone'),
            'company_id'=>Session::get('tmpcompanyid')
        ]);
    }

    }


}

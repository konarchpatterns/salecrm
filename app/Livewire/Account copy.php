<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\assign_company;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Disposition;
use App\Models\User;
use Carbon\Carbon;
use Error;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Account extends Component
{
    use WithPagination;

    public $selectedUserId;
    public $search = '';

    protected $paginationTheme = 'tailwind';

    public $isOpen = false;
    public $isOpenHistory = false;
    public $isOpennew = false;
    public $isOpentime = false;
    public $modalData = '';
    public $companymodalData = '';
    public $company_id = '';
    public $dispo_message;
    public $disposition_timezone;
    public $disposition_time;
    public $disposition_date;
    public $disposition_status;
    public $dispositions;
    public $startTime;
    public $endTime;
    public $selected = [];
    public $selectPage = false;
    public $assignModal = false;
    public $assignUserId;
    public $unassign='all';
    public $sorts = [];
    public $time_period = "all";

    public $isLoading = false;

    protected $listeners = [
        'data-loading' => 'setLoadingTrue',
        'data-loaded' => 'setLoadingFalse',
    ];

    public function setLoadingTrue()
    {
        $this->isLoading = true;
    }

    public function setLoadingFalse()
    {
        $this->isLoading = false;
    }

    public function sortBy($field)
    {
        if (isset($this->sorts[$field])) {
            if ($this->sorts[$field] === 'asc') {
                $this->sorts[$field] = 'desc';
            }
            else {
                unset($this->sorts[$field]);
            }
        } else {
            $this->sorts[$field] = 'asc';
        }
    }

    public function updateSelectPage()
    {
        if ($this->selectPage) {
            if ($this->unassign == "all") {
                $accountssss = DB::table('companies as e')
             ->select('e.id', 'e.name', 'e.website', 'e.fax',
             'users.name as user_name','u2.name as mname'
             , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
             , DB::raw('GROUP_CONCAT(states.name) as stname')
             , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
              DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
             DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
             DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
             DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
             ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
             ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
             ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
             ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
             ->leftJoin('states', 'states.id','=','company_locations.state_id')
             ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
             ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
            ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
            ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
            ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
            ->where('e.name', 'like', '%' . $this->search . '%')
            ->orWhere('e.website', 'like', '%' . $this->search . '%')
            ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
            ->orWhere('countries.name', 'like', '%' . $this->search . '%')
            ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
            ->orWhere('states.name', 'like', '%' . $this->search . '%')
            ->orWhere('cities.name', 'like', '%' . $this->search . '%')
            ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
            ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
            ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name','assign_companies.user_id','u2.name');
            }elseif($this->unassign == "na"){
                $accountssss = DB::table('companies as e')
                ->select('e.id', 'e.name', 'e.website', 'e.fax',
                'users.name as user_name','e.created_at','u2.name as mname'
                , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
                , DB::raw('GROUP_CONCAT(states.name) as stname')
                , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
                 DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
                DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
                DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
                DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
                ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
                ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
                ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
                ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
                ->leftJoin('states', 'states.id','=','company_locations.state_id')
                ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
                ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
               ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
               ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
                ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
                ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
               ->where('e.name', 'like', '%' . $this->search . '%')
               ->orWhere('e.website', 'like', '%' . $this->search . '%')
               ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
               ->orWhere('countries.name', 'like', '%' . $this->search . '%')
               ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
               ->orWhere('states.name', 'like', '%' . $this->search . '%')
               ->orWhere('cities.name', 'like', '%' . $this->search . '%')
               ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
               ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
               ->orderByDesc('e.created_at')
               ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name','e.created_at','u2.name');
            }elseif($this->unassign == "aa"){
                $accountssss = DB::table('assign_companies as ac')
                ->select('c.id', 'c.name', 'c.website', 'c.fax','u2.name as mname', 'users.name as user_name','c.created_at',
                DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
                DB::raw('GROUP_CONCAT(states.name) as stname'),
                DB::raw('GROUP_CONCAT(cities.name) as cityname'),
                DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
                DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
                DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
                DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
                ->leftJoin('companies as c', 'ac.company_id', '=', 'c.id')
                ->leftJoin('users', 'users.id', '=', 'ac.user_id')
                ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
                ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
                ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
                ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
                ->leftJoin('states', 'states.id','=','company_locations.state_id')
                ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
                ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
               ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
               ->leftJoin('users as u2', 'u2.id', '=', 'ac.assign_by')
               ->where('c.name', 'like', '%' . $this->search . '%')
                ->orWhere('c.website', 'like', '%' . $this->search . '%')
                ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                ->orWhere('states.name', 'like', '%' . $this->search . '%')
                ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
               ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.created_at','u2.name','ac.assign_by');
            }elseif($this->unassign == "ua"){
                $accountssss = DB::table('companies as c')
                ->select('c.id', 'c.name', 'c.website', 'c.fax','c.created_at',
                DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
                DB::raw('GROUP_CONCAT(states.name) as stname'),
                DB::raw('GROUP_CONCAT(cities.name) as cityname'),
                DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
                DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
                DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
                DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
                ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
                ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
                ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
                ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
                ->leftJoin('states', 'states.id','=','company_locations.state_id')
                ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
                ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
               ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
                ->whereNotIn('c.id', function($query) {
                    $query->select('ac.company_id')
                          ->from('assign_companies as ac');
                })
                ->where(function($query) {
                    $query->where('c.name', 'like', '%' . $this->search . '%')
                          ->orWhere('c.website', 'like', '%' . $this->search . '%')
                          ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                          ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                          ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                          ->orWhere('states.name', 'like', '%' . $this->search . '%')
                          ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                          ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                          ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%');
                })
                ->groupBy('c.id', 'c.name', 'c.website', 'c.fax','c.created_at');
            }else{
                $accountssss = DB::table('dispositions as d')
                ->select('c.id', 'c.name', 'c.website','u2.name as mname', 'c.fax',
                'users.name as user_name','c.updated_at','c.created_at',
                DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
                DB::raw('GROUP_CONCAT(states.name) as stname'),
                DB::raw('GROUP_CONCAT(cities.name) as cityname'),
                DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
                DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
                DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
                DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
                ->leftJoin('companies as c', 'c.id', '=', 'd.company_id')
                ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
                ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
                ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
                ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
                ->leftJoin('states', 'states.id','=','company_locations.state_id')
                ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
                ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
               ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
                ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'c.id')
                ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
                ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
                ->where('c.name', 'like', '%' . $this->search . '%')
                ->orWhere('c.website', 'like', '%' . $this->search . '%')
                ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                ->orWhere('states.name', 'like', '%' . $this->search . '%')
                ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
                ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.updated_at','c.created_at','u2.name');
            }

            foreach ($this->sorts as $field => $direction) {
                $accountssss->orderBy($field, $direction);
            }

            $account = $accountssss->paginate(10);

            $this->selected = $account->pluck
            ('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function openModal($mobile, $company, $companyid)
    {
        $this->modalData = $mobile;
        $this->companymodalData = $company;
        $this->company_id = $companyid;
        $this->isOpen = true;
    }
    public function opennewModal($companyid)
    {
        $this->isOpen = false;
        $this->isOpennew = true;
        $this->startTime = Carbon::now();
        $this->startTime = $this->startTime->toDateTimeString();
    }

    public function openHistory()
    {
        $this->dispositions = DB::table('dispositions as d')
            ->select('d.phone', 'd.status', 'd.description', 'd.followup_date', 'u.name', 'd.created_at')
            ->leftJoin('users as u', 'u.id', '=', 'd.user_id')
            ->where('d.company_id', '=', $this->company_id)
            ->orderBy('d.id', 'desc')
            ->get();

        // Disposition::select('phone', 'status', 'description', 'followup_date', 'm.name')
        // ->leftJoin('users as m', 'm.name', '=', 'user_id')
        // ->where('company_id', '=', $this->company_id)
        // ->orderBy('id', 'desc')
        // ->get();

        $this->isOpennew = false;
        $this->isOpenHistory = true;
    }

    public function closeHistory()
    {
        $this->isOpenHistory = false;
        $this->isOpennew = true;
    }

    public function opentimedata()
    {
        if ($this->disposition_status == "Follow Up") {
            $this->isOpentime = true;
        } elseif ($this->disposition_status == "Interested") {
            $this->isOpentime = true;
        } elseif ($this->disposition_status == "Call Back") {
            $this->isOpentime = true;
        } else {
            $this->isOpentime = false;
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    protected $rules = [
        'disposition_status' => 'required'
    ];
    public function disposubmission()
    {
        if ($this->disposition_status == "Follow Up") {
            $company_name = Company::select('name')->where('id', '=', $this->company_id)->get();
            Booking::create([
                'title' => 'Call with ' . $company_name[0]->name,
                'discription' => $this->dispo_message . ' at ' . $this->disposition_time . ' ( ' . $this->disposition_timezone . ' )',
                'priority' => 'high',
                'created_by' => 'Admin',
                'updated_by' => 'Admin',
                'start_date' => $this->disposition_date,
                'end_date' => $this->disposition_date,
                'start_time' => $this->disposition_time,
                'end_time' => $this->disposition_time,
            ]);
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'
            ];
        } elseif ($this->disposition_status == "Interested") {
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'
            ];
        } elseif ($this->disposition_status == "Call Back") {
            $this->rules = [
                'disposition_date' => 'required',
                'disposition_timezone' => 'required',
                'disposition_time' => 'required'
            ];
        } else {
            $this->disposition_date = null;
            $this->disposition_timezone = null;
        }
        $this->validate();
        $this->endTime = Carbon::now();
        $this->endTime = $this->endTime->toDateTimeString();
        $time1 = Carbon::parse($this->startTime);
        $time2 = Carbon::parse($this->endTime);

        $totalTime = $time2->diffInSeconds($time1);
        $insert = Disposition::create([
            'user_id' => Auth::id(),
            'company_id' => $this->company_id,
            'description' => $this->dispo_message,
            'status' => $this->disposition_status,
            'followup_date' => $this->disposition_date,
            'followup_time' => $this->disposition_time,
            'timezone' => $this->disposition_timezone,
            'phone' => $this->modalData,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'total_time' => $totalTime
        ]);
        if ($insert) {
            $userdetail = User::find(Auth::id());
            flash()->addSuccess("thanks " . $userdetail->name . " for submitting disposition for " . $this->companymodalData . "");
            $this->isOpennew = false;
        } else {

            flash()->addError("disposition submission failed");
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function assignOpenModal($id)
    {
        $this->assignModal = true;
        $this->assignUserId = $id;
    }

    public function assignCloseModal()
    {
        $this->assignModal = false;
        $this->assignUserId = null;
    }

    public function assignCompanies()
    {
        // Company::whereIn('id', $this->selected)->update(['assign_to' => $this->assignUserId]);
        if(sizeof($this->selected)){
            foreach ($this->selected as $companyId) {
                assign_company::updateOrCreate(
                    ['company_id' => $companyId],
                    ['user_id' => $this->assignUserId,
                     'assign_by' => Auth::id()]
                );
            }
        }
        
        $this->assignUserId = null;
        $this->assignModal = false;
        $this->selectPage = false;
        $this->selected = [];
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

        $callback = function () use ($users, $columns) {
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

    public function render()
    {
        if ($this->unassign == "all") {
            $latestDispositionSubquery = DB::table('dispositions as d')
    ->select('d.company_id', 'd.status')
    ->whereRaw('d.id = (SELECT MAX(d2.id) FROM dispositions as d2 WHERE d2.company_id = d.company_id)')
    ->toSql();

$accountssss = DB::table('companies as e')
    ->select(
        'e.id', 
        'e.name', 
        'e.website', 
        'e.fax',
        'users.name as user_name', 
        'u2.name as mname',
        DB::raw('latest_dispositions.status as disposition_status'),  // Alias for the latest disposition status
        DB::raw('GROUP_CONCAT(DISTINCT countries.shortname) as couname'),
        DB::raw('GROUP_CONCAT(DISTINCT states.name) as stname'),
        DB::raw('GROUP_CONCAT(DISTINCT cities.name) as cityname'),
        DB::raw('GROUP_CONCAT(DISTINCT company_locations.timezone) as timezone'),
        DB::raw('GROUP_CONCAT(DISTINCT company_emails.email) as companymail'),
        DB::raw('GROUP_CONCAT(DISTINCT CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
        DB::raw('GROUP_CONCAT(DISTINCT CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp')
    )
    ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
    ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
    ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
    ->leftJoin('countries', 'countries.id', '=', 'company_locations.country_id')
    ->leftJoin('states', 'states.id', '=', 'company_locations.state_id')
    ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
    ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
    ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
    ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
    ->leftJoin(DB::raw("({$latestDispositionSubquery}) as latest_dispositions"), 'latest_dispositions.company_id', '=', 'e.id')
    ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
    ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
    ->where(function($query) {
        $query->where('e.name', 'like', '%' . $this->search . '%')
            ->orWhere('e.website', 'like', '%' . $this->search . '%')
            ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
            ->orWhere('countries.name', 'like', '%' . $this->search . '%')
            ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
            ->orWhere('states.name', 'like', '%' . $this->search . '%')
            ->orWhere('cities.name', 'like', '%' . $this->search . '%')
            ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
            ->orWhere('clients_phones.phone', 'like', '%' . $this->search . '%');
    })
    ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name', 'assign_companies.user_id', 'u2.name', 'latest_dispositions.status');

        //     $accountssss = DB::table('companies as e')
        //  ->select('e.id', 'e.name', 'e.website', 'e.fax',
        //  'users.name as user_name','u2.name as mname','dispositions.status'
        //  , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
        //  , DB::raw('GROUP_CONCAT(states.name) as stname')
        //  , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
        //   DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
        //  DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
        //  DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
        //  DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
        //  ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
        //  ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
        //  ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
        //  ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
        //  ->leftJoin('states', 'states.id','=','company_locations.state_id')
        //  ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
        //  ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
        // ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
        // ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
        // ->leftJoin('dispositions', 'dispositions.company_id', '=', 'e.id' )
        // ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
        // ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
        // ->where('e.name', 'like', '%' . $this->search . '%')
        // ->orWhere('e.website', 'like', '%' . $this->search . '%')
        // ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
        // ->orWhere('countries.name', 'like', '%' . $this->search . '%')
        // ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
        // ->orWhere('states.name', 'like', '%' . $this->search . '%')
        // ->orWhere('cities.name', 'like', '%' . $this->search . '%')
        // ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
        // ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
        // ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name','assign_companies.user_id','u2.name');
        }elseif($this->time_period != "all"){
            if($this->unassign == "na"){
                $dtt = Carbon::now()->subMonths($this->time_period)->toDateString();
                $accountssss = DB::table('companies as e')
            ->select('e.id', 'e.name', 'e.website', 'e.fax',
            'users.name as user_name','e.created_at', 'u2.name as mname'
            , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
            , DB::raw('GROUP_CONCAT(states.name) as stname')
            , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
           ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
            ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
            ->whereDate("e.created_at", ">=", $dtt)
           ->where(function($query) {
            $query->where('e.name', 'like', '%' . $this->search . '%')
                  ->orWhere('e.website', 'like', '%' . $this->search . '%')
                  ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                  ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                  ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                  ->orWhere('states.name', 'like', '%' . $this->search . '%')
                  ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                  ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                  ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%');
            })
           ->orderByDesc('e.created_at')
           ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name','e.created_at','u2.name');
            }elseif($this->unassign == "aa"){
                $dtt = Carbon::now()->subMonths($this->time_period)->toDateString();
                $accountssss = DB::table('assign_companies as ac')
            ->select('c.id', 'c.name', 'c.website', 'c.fax','u2.name as mname', 'users.name as user_name','c.created_at',
            DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
            DB::raw('GROUP_CONCAT(states.name) as stname'),
            DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('companies as c', 'ac.company_id', '=', 'c.id')
            ->leftJoin('users', 'users.id', '=', 'ac.user_id')
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
           ->leftJoin('users as u2', 'u2.id', '=', 'ac.assign_by')
           ->whereDate("ac.updated_at", ">=", $dtt)
           ->where(function($query){
                $query->where('c.name', 'like', '%' . $this->search . '%')
                ->orWhere('c.website', 'like', '%' . $this->search . '%')
                ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                ->orWhere('states.name', 'like', '%' . $this->search . '%')
                ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%');
           })
           ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.created_at','u2.name','ac.assign_by');
            }else{
                $dtt = Carbon::now()->subMonths($this->time_period)->toDateString();
                $accountssss = DB::table('dispositions as d')
            ->select('c.id', 'c.name', 'c.website','u2.name as mname', 'c.fax',
            'users.name as user_name','c.updated_at','c.created_at',
            DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
            DB::raw('GROUP_CONCAT(states.name) as stname'),
            DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('companies as c', 'c.id', '=', 'd.company_id')
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
            ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'c.id')
            ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
            ->whereDate("d.created_at", ">=", $dtt)
            ->where(function($query){
                $query->where('c.name', 'like', '%' . $this->search . '%')
                ->orWhere('c.website', 'like', '%' . $this->search . '%')
                ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                ->orWhere('states.name', 'like', '%' . $this->search . '%')
                ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%');
            })
            ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.updated_at','c.created_at','u2.name');
            }
        }elseif($this->unassign == "na"){
            $accountssss = DB::table('companies as e')
            ->select('e.id', 'e.name', 'e.website', 'e.fax',
            'users.name as user_name','e.created_at','u2.name as mname'
            , DB::raw('GROUP_CONCAT(countries.shortname) as couname')
            , DB::raw('GROUP_CONCAT(states.name) as stname')
            , DB::raw('GROUP_CONCAT(cities.name) as cityname'),
             DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'e.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'e.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'e.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'e.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
           ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'e.id')
            ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
           ->where('e.name', 'like', '%' . $this->search . '%')
           ->orWhere('e.website', 'like', '%' . $this->search . '%')
           ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
           ->orWhere('countries.name', 'like', '%' . $this->search . '%')
           ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
           ->orWhere('states.name', 'like', '%' . $this->search . '%')
           ->orWhere('cities.name', 'like', '%' . $this->search . '%')
           ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
           ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
           ->orderByDesc('e.created_at')
           ->groupBy('e.id', 'e.name', 'e.website', 'e.fax', 'users.name','e.created_at','u2.name');
        }elseif($this->unassign == "aa"){
            $accountssss = DB::table('assign_companies as ac')
            ->select('c.id', 'c.name', 'c.website', 'c.fax','u2.name as mname', 'users.name as user_name','c.created_at',
            DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
            DB::raw('GROUP_CONCAT(states.name) as stname'),
            DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('companies as c', 'ac.company_id', '=', 'c.id')
            ->leftJoin('users', 'users.id', '=', 'ac.user_id')
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
           ->leftJoin('users as u2', 'u2.id', '=', 'ac.assign_by')
           ->where('c.name', 'like', '%' . $this->search . '%')
            ->orWhere('c.website', 'like', '%' . $this->search . '%')
            ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
            ->orWhere('countries.name', 'like', '%' . $this->search . '%')
            ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
            ->orWhere('states.name', 'like', '%' . $this->search . '%')
            ->orWhere('cities.name', 'like', '%' . $this->search . '%')
            ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
            ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
           ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.created_at','u2.name','ac.assign_by');
        }elseif($this->unassign == "ua"){
            $accountssss = DB::table('companies as c')
            ->select('c.id', 'c.name', 'c.website', 'c.fax','c.created_at',
            DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
            DB::raw('GROUP_CONCAT(states.name) as stname'),
            DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
            ->whereNotIn('c.id', function($query) {
                $query->select('ac.company_id')
                      ->from('assign_companies as ac');
            })
            ->where(function($query) {
                $query->where('c.name', 'like', '%' . $this->search . '%')
                      ->orWhere('c.website', 'like', '%' . $this->search . '%')
                      ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
                      ->orWhere('countries.name', 'like', '%' . $this->search . '%')
                      ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
                      ->orWhere('states.name', 'like', '%' . $this->search . '%')
                      ->orWhere('cities.name', 'like', '%' . $this->search . '%')
                      ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
                      ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%');
            })
            ->groupBy('c.id', 'c.name', 'c.website', 'c.fax','c.created_at');
        }else{
            $accountssss = DB::table('dispositions as d')
            ->select('c.id', 'c.name', 'c.website','u2.name as mname', 'c.fax',
            'users.name as user_name','c.updated_at','c.created_at',
            DB::raw('GROUP_CONCAT(countries.shortname) as couname'),
            DB::raw('GROUP_CONCAT(states.name) as stname'),
            DB::raw('GROUP_CONCAT(cities.name) as cityname'),
            DB::raw('GROUP_CONCAT(company_locations.timezone) as timezone'),
            DB::raw('GROUP_CONCAT(company_emails.email) as companymail'),
            DB::raw('GROUP_CONCAT(CONCAT(company_phones.phone, "-", company_phones.type)) as clpp'),
            DB::raw('GROUP_CONCAT(CONCAT(clients_phones.phone, "-", clients_phones.type)) as clp'))
            ->leftJoin('companies as c', 'c.id', '=', 'd.company_id')
            ->leftJoin('company_phones', 'company_phones.company_id', '=', 'c.id')
            ->leftJoin('company_emails', 'company_emails.company_id', '=', 'c.id')
            ->leftJoin('company_locations', 'company_locations.company_id', '=', 'c.id')
            ->leftJoin('countries', 'countries.id','=','company_locations.country_id')
            ->leftJoin('states', 'states.id','=','company_locations.state_id')
            ->leftJoin('clients', 'clients.companyId', '=', 'c.id')
            ->leftJoin('cities', 'cities.id', '=', 'company_locations.city_id')
           ->leftJoin('clients_phones', 'clients_phones.clients_id', '=', 'clients.id')
            ->leftJoin('assign_companies', 'assign_companies.company_id', '=', 'c.id')
            ->leftJoin('users', 'users.id', '=', 'assign_companies.user_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'assign_companies.assign_by')
            ->where('c.name', 'like', '%' . $this->search . '%')
            ->orWhere('c.website', 'like', '%' . $this->search . '%')
            ->orWhere('company_phones.phone', 'like', '%' . $this->search . '%')
            ->orWhere('countries.name', 'like', '%' . $this->search . '%')
            ->orWhere('countries.shortname', 'like', '%' . $this->search . '%')
            ->orWhere('states.name', 'like', '%' . $this->search . '%')
            ->orWhere('cities.name', 'like', '%' . $this->search . '%')
            ->orWhere('company_emails.email', 'like', '%' . $this->search . '%')
            ->orWhere('clients_phones.phone', 'like', '%' . $this->search .'%')
            ->groupBy('c.id', 'c.name', 'c.website', 'c.fax', 'users.name','c.updated_at','c.created_at','u2.name');
        }

        foreach ($this->sorts as $field => $direction) {
            $accountssss->orderBy($field, $direction);
        }

        $account = $accountssss->paginate(10);

        $users = User::select('id', 'name')->where('flag',0)->get();
        return view('livewire.account', ['account' => $account, 'users' => $users]);
    }
}

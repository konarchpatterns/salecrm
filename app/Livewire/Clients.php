<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use App\Models\client;
use App\Models\Company;
use App\Models\Disposition;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;
    public $selectedUserId;
    public $search = '';
    public $modal = false;
    public $callto;
    public $cname;
    public $isOpenHistory = false;
    public $isOpennew = false;
    public $isOpentime = false;
    public $company_id = '';
    public $dispo_message;
    public $disposition_timezone;
    public $disposition_time;
    public $disposition_date;
    public $disposition_status;
    public $dispositions;
    public $startTime;
    public $endTime;
    public $client_id = "";

    public function openModal($val , $id, $cname, $cId){
        $this->modal = true;
        $this->callto = $val;
        $this->cname = $cname;
        $this->company_id = $id;
        $this->client_id = $cId;
    }
    public function opennewModal($companyid)
    {
        $this->modal = false;
        $this->isOpennew = true;
        $this->startTime = Carbon::now();
        $this->startTime = $this->startTime->toDateTimeString();
    }

    public function openHistory()
    {
        $this->dispositions = DB::table('dispositions as d')
            ->select('d.phone', 'd.status', 'd.description', 'd.followup_date', 'u.name', 'd.created_at')
            ->leftJoin('users as u', 'u.id', '=', 'd.user_id')
            ->where('d.client_id', '=', $this->client_id)
            ->orderBy('d.id', 'desc')
            ->get();

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

    protected $rules = [
        'disposition_status' => 'required'
    ];
    public function disposubmission()
    {
        if ($this->disposition_status == "Follow Up") {
            $client_name = DB::table('clients')->select('fname', 'lname')->where('id', '=', $this->client_id)->get();
            Booking::create([
                'title' => 'Call with ' . $client_name[0]->fname . ' ' . $client_name[0]->lname,
                'discription' => $this->dispo_message . ' at ' . $this->disposition_time . ' ( ' . $this->disposition_timezone . ' )',
                'priority' => 'high',
                'created_by' => 'Admin',
                'updated_by' => 'Admin',
                'start_date' => $this->disposition_date,
                'end_date' => $this->disposition_date,
                'start_time' => $this->disposition_time,
                'end_time' => $this->disposition_time,
                'company_id' => $this->company_id,
                'client_id' => $this->client_id
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
            'client_id' => $this->client_id,
            'description' => $this->dispo_message,
            'status' => $this->disposition_status,
            'followup_date' => $this->disposition_date,
            'followup_time' => $this->disposition_time,
            'timezone' => $this->disposition_timezone,
            'phone' => $this->callto,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'total_time' => $totalTime
        ]);
        if ($insert) {
            $userdetail = User::find(Auth::id());
            flash()->addSuccess("thanks " . $userdetail->name . " for submitting disposition for " . $this->callto . "");
            $this->isOpennew = false;
        } else {

            flash()->addError("disposition submission failed");
        }
    }

    public function closeModal(){
        $this->modal = false;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $clients = DB::table('clients as e')
    ->select(
        'e.id',
        'e.fname',
        'e.lname',
        'e.designation',
        'e.companyId',
        'e.linkdinurl',
        'companies.name as cname',
        DB::raw('GROUP_CONCAT(DISTINCT CONCAT(cp.phone, "-", cp.type) ORDER BY cp.type ASC SEPARATOR ", ") as clpp'),
        DB::raw('GROUP_CONCAT(DISTINCT CONCAT(cm.mail, "-", cm.type) ORDER BY cp.type ASC SEPARATOR ", ") as clmm')
    )
    ->leftJoin('companies', 'e.companyId', '=', 'companies.id')
    ->leftJoin('clients_phones as cp', 'e.id', '=', 'cp.clients_id')
    ->leftJoin('clients_emails as cm', 'e.id', '=', 'cm.clients_id')
    ->where(function($query) {
        $query->where('e.fname', 'like', '%' . $this->search . '%')
              ->orWhere('e.lname', 'like', '%' . $this->search . '%')
              ->orWhere('e.designation', 'like', '%' . $this->search . '%')
              ->orWhere('companies.name', 'like', '%' . $this->search . '%');
    })
    ->groupBy(
        'e.id',
        'e.fname',
        'e.lname',
        'e.designation',
        'e.companyId',
        'e.linkdinurl',
        'companies.name'
    )
    ->paginate(10);
    // dd($clients);
        return view('livewire.clients', ['clients' => $clients]);
    }
}

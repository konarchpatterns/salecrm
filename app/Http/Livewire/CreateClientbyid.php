<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

use App\Models\client;
use App\Models\clients_email;
use App\Models\clients_phone;
use App\Models\Company;
use Illuminate\Support\Facades\Redirect;

class CreateClientbyid extends Component
{
    public $open = false;
    public $value = 'select company';
    public $query;

    public $companies;


    public $companyId;
    public $fname;
    public $lname;
    public $designation;
    public $linkdin_url;
    public $phone;
    public $phonetype;
    public $inputs;
    public $email;
    public $emailtype;
    public $emailinputs;
    public $cnames;
    public $cid;




    public function __construct()
    {
        $this->inputs = new Collection();
        $this->emailinputs = new Collection();
        $this->inputs->push(['phonetype' => '']);
        $this->emailinputs->push(['emailtype' => '']);
    }

    public function addInput()
    {
        $this->inputs->push(['phonetype' => '']);
    }

    public function removeInput($key)
    {
        $this->inputs->pull($key);
    }

    public function addInputEmail()
    {
        $this->emailinputs->push(['emailtype' => '']);
    }

    public function removeInputEmail($key)
    {
        $this->emailinputs->pull($key);
    }

    public function render()
    {
        $this->companies = Company::select('name', 'id')->where('name', 'like', '%' . $this->query . '%') ->orderBy('name','ASC')->get();

        return view('livewire.create-clientbyid');
    }
    public function save(){
        if($this->cid){
            $inst = client::create([
                'fname' => $this->fname,
                'lname' => $this->lname,
                'designation' => $this->designation,
                'companyId' => $this->cid,
                'linkdinurl' => $this->linkdin_url
            ]);
        }else{
            dd('Select valid company');
        }
        if(count($this->emailinputs)>0){
            foreach($this->emailinputs as $input){
                if(count($input)>1){
                    clients_email::create([
                        'clients_id'=>$inst->id,
                        'mail'=>$input['email'],
                        'type'=>$input['emailtype']
                    ]);
                }
            }
        }

        if(count($this->emailinputs)>0){
            foreach($this->inputs as $input){
                if(count($input)>1){
                clients_phone::create([
                    'clients_id' => $inst->id,
                    'phone'=> $input['phone'],
                    'type'=> $input['phonetype']
                ]);
            }
            }
        }
        return Redirect::route('clients.view-clients',['id'=>$this->cid]);
    }
}

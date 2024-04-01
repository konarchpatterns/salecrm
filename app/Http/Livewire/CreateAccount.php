<?php

namespace App\Http\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Redirect;
use App\Models\Company;
use App\Models\CompanyLocation;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPhone;
use App\Models\CompanyEmail;
use App\Models\CompanyBusiness;
use Illuminate\Support\Collection;

class CreateAccount extends Component
{

    public $name;

    public $website;
    public $fax;
    public $cities;
    public $states ;
    public $countries ;
    public  $companyphone;
    public $country_id = 249;
    public $state_id = 4122;
    public $companyphonetype;
    public $city_id = 48357;
    public Collection $inputs;
    public Collection $companymail;
    public $block;
    public $street;
    public $address;
    public $zip;
    public $timezone;
    public $business_type;
    public $description;



public function addInput()
{
    $this->inputs->push(['companyphones' => '']);
}
public function addInputEmail()
{
    $this->companymail->push(['companyemails' => '']);
}
public function removeInput($key)
{
    $this->inputs->pull($key);
}
public function removeInputEmail($key)
{
    $this->companymail->pull($key);
}
protected $rules = [
    'name' => 'required|unique:companies,name',
    'fax' => 'unique:companies,fax',
    'website' => 'unique:companies,website',
    'country_id' => 'required',
    // 'companyphone' => 'required',
    // 'companyphonetype' => 'required',
    'state_id' => 'required',
    'business_type' => 'required'

   // 'inputs.1-*.companyphones' => 'required',
];


    public function mount(){
        $this->countries = Country::orderby('name','asc')
                            ->select('*')->where('id','!=','249')
                            ->get();
        $this->fill([
                                'inputs' => collect([['companyphones' => '']]),
                                'companymail' => collect([['companyemails' => '']]),
                            ]);
    }

    // Fetch states of a country
    public function getCountryStates(){

         $this->states = State::orderby('name','asc')
                         ->select('*')
                         ->where('country_id',$this->country_id)
                         ->where('country_id','!=','4122')
                         ->get();

         // Reset values
         unset($this->cities);
         $this->state_id =4137;
         $this->city_id = 48357;
    }

    // Fetch cities of a state
    public function getStateCities(){
         $this->cities = City::orderby('name','asc')
                         ->select('*')
                         ->where('state_id',$this->state_id)
                         ->where('state_id','!=','48357')
                         ->get();

         // Reset value
         $this->city_id = 48357;
    }

    public function save()
    {
        $this->validate();

        $ins=Company::create(
            [
                "name"=>$this->name,
                "fax"=>$this->fax,
                "website"=>$this->website
                ]
        );
        if($ins)
        {
        CompanyLocation::create(
            [
                "company_id"=>$ins->id,
                "country_id"=>$this->country_id,
                "state_id"=>$this->state_id,
                "city_id"=>$this->city_id,
                "block"=>$this->block,
                "street"=>$this->street,
                "address"=>$this->address,
                "zip"=>$this->zip,
                "timezone"=>$this->timezone
                ]
        );

        if(($this->business_type!="")&&($this->description!=""))
        {
        CompanyBusiness::create(
            [
                "company_id"=>$ins->id,
                "type"=>$this->business_type,
                "description"=>$this->description
                ]
        );
    }

        foreach($this->inputs as $keyc => $inputc){
            if(($inputc['companyphones']!="")&&($inputc['companyphonestype']!=""))
            {
            CompanyPhone::create(
                [
                    "company_id"=>$ins->id,
                    "phone"=>$inputc['companyphones'],
                    "type"=>$inputc['companyphonestype']
                    ]
            );
        }
        }

        foreach($this->companymail as $keycc => $inputcc){
            if(($inputcc['companyemails']!="")&&($inputcc['companyemailstype']!=""))
            {
            CompanyEmail::create(
                [
                    "company_id"=>$ins->id,
                    "email"=>$inputcc['companyemails'],
                    "type"=>$inputcc['companyemailstype']
                    ]
            );
        }
        }
    }
        flash()->addSuccess('Your account has been added successfully.');

        return redirect::route('account.index');
    }

    public function render()
    {

       // $data['countries'] = Country::get(["name", "id"]);
        return view('livewire.create-account');
    }
}

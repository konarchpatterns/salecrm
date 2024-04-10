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
use App\Models\User;
use Illuminate\Support\Collection;

class UpdateAccount extends Component
{
    public $name;

    public $website;
    public $fax;
    public $cities;
    public $states ;
    public $countries ;
    public $selectcountries ;
    public $selectstates ;
    public $selectcity ;
    public $selectcitysec ;
    // public $countryidss;
    // public $stateidss;
    // public $cityidss;
    public  $companyphone;
    public $country_id;
    public $state_id;
    public $companyphonetype;
    public $city_id;
    public Collection $inputs;
    public Collection $companymail;
    public $block;
    public $street;
    public $address;
    public $zip;
    public $timezone;
    public $business_type;
    public $description;
    public $accountid;
    public $assign_to;
    public $assign_by;


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

    public function mount($accountid){

                        $company=Company::select('companies.name','companies.website',
                        'companies.fax','company_businesses.type as btype',
                        'company_businesses.description','company_locations.country_id'
                        ,'company_locations.state_id','company_locations.city_id','company_locations.block'
                        ,'company_locations.street','company_locations.address','company_locations.zip','companies.assign_by','companies.assign_to'
                        ,'company_locations.timezone','countries.name as country','states.name as state','cities.name as city')
                        ->leftjoin('company_businesses','companies.id','=','company_businesses.company_id')
                        ->leftjoin('company_locations','companies.id','=','company_locations.company_id')
                        ->leftjoin('countries','company_locations.country_id','=','countries.id')
                        ->leftjoin('states','company_locations.state_id','=','states.id')
                        ->leftjoin('cities','company_locations.city_id','=','cities.id')
                         ->where('companies.id','=',$accountid)->get();

                         $user1=User::find($company[0]['assign_by']);
                         $user2=User::find($company[0]['assign_to']);


                        $phone=Company::select('company_phones.phone','company_phones.type as phonetype')
                         ->leftjoin('company_phones','companies.id','=','company_phones.company_id')
                          ->where('companies.id','=',$accountid)->get();
                        $email=Company::select('company_emails.email','company_emails.type as emailtype')
                           ->leftjoin('company_emails','companies.id','=','company_emails.company_id')
                            ->where('companies.id','=',$accountid)->get();
                        $this->name=$company[0]['name'];
                        $this->fax=$company[0]['fax'];
                        $this->website=$company[0]['website'];
                        $this->block=$company[0]['block'];
                        $this->street=$company[0]['street'];
                        $this->address=$company[0]['address'];
                        $this->zip=$company[0]['zip'];
                        $this->timezone=$company[0]['timezone'];
                        $this->business_type=$company[0]['btype'];
                        $this->description=$company[0]['description'];
                        $this->assign_by=$user1['name'];
                        $this->assign_to=$user2['name'];
                        $this->inputs=collect();
                        $this->companymail=collect();
                        $this->countries = Country::orderby('name','asc')
                        ->select('*')->where('id','!=','249')
                        ->get();
                        $this->selectcountries = Country::orderby('name','asc')
                        ->select('*')->where('id','=',$company[0]['country_id'])
                        ->get();
                        $this->selectcitysec = State::orderby('name','asc')
                        ->select('*')
                        ->where('country_id','=',$company[0]['country_id'])
                        ->get();

                        $this->selectstates  = State::orderby('name','asc')
                        ->select('*')->where('id','=',$company[0]['state_id'])
                        ->get();
                        $this->selectcity  = City::orderby('name','asc')
                        ->select('*')->where('id','=',$company[0]['city_id'])
                        ->get();
                        if(count($phone)>0){
                        foreach($phone as $key=>$val)
                        {

                            $this->inputs->push(['companyphones' =>$phone[$key]['phone'],
                            'companyphonestype' =>$phone[$key]['phonetype']]);
                        }

                        }
                        else{
                            $this->fill([
                                'inputs' => collect([['companyphones' => '']])
                            ]);
                        }

                        if(count($email)>0){
                        foreach($email as $key=>$val)
                        {

                            $this->companymail->push(['companyemails' =>$email[$key]['email'],
                            'companyemailstype' =>$email[$key]['emailtype']]);
                        }


                    }
                    else{
                        $this->fill([
                            'companymail' => collect([['companyemails' => '']])
                        ]);
                    }
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

        unset($this->selectstates);
        unset($this->selectstatessec);
        unset($this->selectcity);
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

    public function render()
    {
        return view('livewire.update-account');
    }

    public function update(){

        /** company information update */
        if($this->name!="")
        {
        Company::where("id", $this->accountid)->update([
            "name"=>$this->name,
            "website"=>$this->website,
            "fax"=>$this->fax
        ]);
    }
    else{

        flash()->addError('Your account name is required.');
    }
      /** company information update */


      if(count($this->inputs)>0)
      {
      CompanyPhone::where('company_id','=',$this->accountid)->delete();
      foreach($this->inputs as $key=>$val)
      {
        if($val['companyphones']!="")
        {
      CompanyPhone::create(
        [
            "company_id"=>$this->accountid,
            "phone"=>$val['companyphones'],
            "type"=>$val['companyphonestype']
            ]
    );
}
}
  }


  if(count($this->companymail)>0)
  {
  CompanyEmail::where('company_id','=',$this->accountid)->delete();
  foreach($this->companymail as $key=>$val)
  {
    if($val['companyemails']!="")
    {

    CompanyEmail::create(
    [
        "company_id"=>$this->accountid,
        "email"=>$val['companyemails'],
        "type"=>$val['companyemailstype']
        ]
);
    }
}
}

$companyloc=CompanyLocation::select("*")->where("company_id", $this->accountid)->get();
    if(count($companyloc)>0)
    {

    CompanyLocation::where("company_id", $this->accountid)->update([
        "block"=>$this->block,
        "street"=>$this->street,
        "address"=>$this->address,
        "zip"=>$this->zip,
        "country_id"=>$this->country_id,
        "state_id"=>$this->state_id,
        "city_id"=>$this->city_id,
        "timezone"=>$this->timezone
    ]);

    }
    else{

        CompanyLocation::create(
            [
                "company_id"=>$this->accountid,
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
    }

    $companybusiness=CompanyBusiness::select("*")->where("company_id", $this->accountid)->get();
    if(count($companybusiness)>0)
    {
        if($this->business_type!="")
        {
    CompanyBusiness::where("company_id", $this->accountid)->update([
        "type"=>$this->business_type,
        "description"=>$this->description
    ]);
}
}
else{
    if($this->business_type!="")
    {
    CompanyBusiness::create(
        [
            "company_id"=> $this->accountid,
            "type"=>$this->business_type,
            "description"=>$this->description
        ]);

    }
    else{

flash()->addError('business type is necessary.');
    }
}


flash()->addSuccess('Your account has been updated successfully.');


    }
}

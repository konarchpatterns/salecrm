<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyLocation;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPhone;
use App\Models\CompanyEmail;
use App\Models\CompanyBusiness;

class AccountsController extends Controller
{
    public function create(){
        return view('account.create');
    }
    public function index(){
        return view('account.index');
    }
    public function update(Request $request){
        $id=$request->id;
        $companyloc=CompanyLocation::select("*")->where('company_id',$id)->get();
        if(count($companyloc)>0)
        {
        $countryidss=$companyloc[0]['country_id'];
        $stateidss=$companyloc[0]['state_id'];
        $cityidss=$companyloc[0]['city_id'];
        }
        else{
            $countryidss=249;
            $stateidss=4122;
            $cityidss=48357;
        }
        return view('account.update',compact('id','countryidss','stateidss','cityidss'));
    }
    public function createClient(){

        return view('account.createClient');
    }
    public function createClientById(){

        return view('account.createClient');
    }
}

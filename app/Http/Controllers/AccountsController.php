<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyLocation;

use App\Models\CompanyPhone;
use App\Models\CompanyEmail;
use App\Models\CompanyBusiness;
use App\Models\Disposition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function create()
    {
        return view('account.create');
    }
    public function index()
    {
        return view('account.index');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $companyloc = CompanyLocation::select("*")->where('company_id', $id)->get();
        if (count($companyloc) > 0) {
            $countryidss = $companyloc[0]['country_id'];
            $stateidss = $companyloc[0]['state_id'];
            $cityidss = $companyloc[0]['city_id'];
        } else {
            $countryidss = 249;
            $stateidss = 4122;
            $cityidss = 48357;
        }
        return view('account.update', compact('id', 'countryidss', 'stateidss', 'cityidss'));
    }
    public function createClient()
    {
        return view('account.createClient');
    }
    public function createClientById()
    {

        return view('account.createClient');
    }
    public function view(Request $request)
    {
        $companyId = $request->id;
        $companyDetails = Company::select('name', 'website', 'fax')->where('id', '=', $companyId)->get();
        $otherDetails = CompanyBusiness::select('type','business_type', 'description')->where('company_id', '=', $companyId)->get();
        $address = CompanyLocation::select('company_locations.block', 'company_locations.street', 'company_locations.address', 'company_locations.zip', 'company_locations.timezone', 'company_locations.country_id', 'company_locations.state_id', 'company_locations.city_id', 'countries.name as country_name', 'cities.name as city_name', 'states.name as state_name')->leftjoin('countries', 'company_locations.country_id', '=', 'countries.id')->leftjoin('cities', 'company_locations.city_id', '=', 'cities.id')->leftjoin('states', 'company_locations.state_id', '=', 'states.id')->where('company_id', '=', $companyId)->get();
        $emails = CompanyEmail::select('email', 'type')->where('company_id', '=', $companyId)->get();
        $phones = CompanyPhone::select('phone', 'type')->where('company_id', '=', $companyId)->get();

        $activity = DB::table('activity_log as a')->select('a.id', 'a.description', 'a.subject_type', 'a.event', 'a.subject_id', 'a.properties', 'a.created_at', 'u.name' )->leftJoin('users as u', 'u.id', '=', 'a.causer_id')
        ->where('properties', 'like', '%"company_id":' . $companyId . ',%')
        ->orWhere('subject_id', 'like', '%'. $companyId  . '%')
        ->get();

        return view('account.view', compact('companyDetails', 'otherDetails', 'address', 'emails', 'phones', 'companyId', 'activity'));
    }
    public function apiData(Request $request)
    {
        Disposition::create([
            'user_id' => Auth::id(),
            'company_id' => $request->id,
            'description' => "Window Refresh",
            'status' => "Window Refresh",
            'phone' => "-",
        ]);
    }
}

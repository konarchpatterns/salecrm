<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\clients_email;
use App\Models\clients_phone;
use App\Models\Company;

class ClientsController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function update(Request $request)
    {
        $key_id = $request->id;
        return view('clients.update-client', compact('key_id'));
    }
    public function viewClients(Request $request)
    {
        $clientId = $request->id;
        $clients = client::select('clients.id', 'clients.companyId', 'clients.fname', 'clients.lname', 'clients.designation', 'clients.linkdinurl')
            ->where('companyId', '=', $clientId)->get();
        $phones = [];
        foreach ($clients as $key => $client) {
            $phones[$key] = clients_phone::select('id', 'clients_id', 'phone', 'type')->where('clients_id', '=', $client->id)->get();
        }
        $emails = [];
        foreach ($clients as $key => $client) {
            $emails[$key] = clients_email::select('id', 'clients_id', 'mail', 'type')->where('clients_id', '=', $client->id)->get();
        }

        $companydetail = Company::select('id', 'name')->where('id', '=', $clientId)->get();
        $company = $companydetail[0]->name;
        $companyid = $companydetail[0]->id;

        return view('clients.view-clients', compact('clientId', 'clients', 'phones', 'emails', 'company', 'companyid'));
    }
    public function createClient()
    {

        return view('account.createClient');
    }
    public function createClientById(Request $request)
    {
        /*
        public function mount(){

            $client = Client::select('clients.id', 'clients.fname', 'clients.lname', 'clients.designation', 'clients.companyId', 'clients.linkdinurl')
            ->where('clients.id', '=', $this->key_id)
            ->get();
            */
        $cname = Company::find($request->id);

        return view('account.createClientbyid', ['id' => $request->id, 'companyname' => $cname->name]);
    }
}

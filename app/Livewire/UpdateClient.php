<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\client;
use App\Models\clients_email;
use App\Models\clients_phone;

use App\Models\Company;
use Exception;
use Illuminate\Support\Collection;

class UpdateClient extends Component
{
    public $key_id;
    public $fname;
    public $lname;
    public $designation;
    public $companyId;
    public $linkdinurl;

    public Collection $inputs;
    public $phoneId;
    public $phone;
    public $phonetype;

    public Collection $emailinputs;
    public $emailId;
    public $email;
    public $emailtype;
    public function addInput()
    {
        $this->inputs->push(['phone' => '']);
    }
    public function addInputEmail()
    {
        $this->emailinputs->push(['email' => '']);
    }
    public function removeInput($key, $id)
    {
        $this->inputs->pull($key);
        clients_phone::where('id', $id)->delete();
    }
    public function removeInputEmail($key, $id)
    {
        $this->emailinputs->pull($key);
        clients_email::where('id', $id)->delete();
    }

    public function mount()
    {

        $client = Client::select('clients.id', 'clients.fname', 'clients.lname', 'clients.designation', 'clients.companyId', 'clients.linkdinurl')
            ->where('clients.id', '=', $this->key_id)
            ->get();

        $phone = clients_phone::select('id', 'clients_id', 'phone', 'type')->where('clients_id', '=', $this->key_id)->get();

        $email = clients_email::select('id', 'clients_id', 'mail', 'type')->where('clients_id', '=', $this->key_id)->get();

        $this->fname = $client[0]->fname;
        $this->lname = $client[0]->lname;
        $this->designation = $client[0]->designation;
        $this->companyId = $client[0]->companyId;
        $this->linkdinurl = $client[0]->linkdinurl;
        $this->inputs = collect();
        $this->emailinputs = collect();


        if (count($phone) > 0) {
            foreach ($phone as $key => $val) {
                $this->inputs->push([
                    'phone' => $phone[$key]['phone'],
                    'phonetype' => $phone[$key]['type'],
                    'phoneId' => $phone[$key]['id']
                ]);
            }
        } else {
            $this->inputs->push([
                'phone' => ''
            ]);
        }

        if (count($email) > 0) {
            foreach ($email as $key => $val) {
                $this->emailinputs->push([
                    'email' => $email[$key]['mail'],
                    'emailtype' => $email[$key]['type'],
                    'emailId' => $email[$key]['id']
                ]);
            }
        } else {
            $this->emailinputs->push([
                'email' => ''
            ]);
        }
    }
    public function render()
    {
        $companies = Company::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('livewire.update-client');
    }
    public function save()
    {
        $client = client::find($this->key_id);
        $client->lname = $this->lname;
        $client->fname = $this->fname;
        $client->designation = $this->designation;
        $client->companyId = $this->companyId;
        $client->linkdinurl = $this->linkdinurl;

        $client->save();

        $arrs = clients_phone::select('id', 'phone', 'type', 'clients_id')->where('clients_id', '=', $this->key_id)->get();

        if (count($arrs) > 0) {
            foreach ($this->inputs as $input) {
                $flag = false;
                $tableId = 0;
                foreach ($arrs as $arr) {
                    try {
                        if ($input['phoneId'] == $arr->id) {
                            $flag = true;
                            $tableId = $arr->id;
                        }
                    } catch (Exception $e) {
                    }
                }
                if ($flag) {
                    if ($input['phone']) {
                        clients_phone::where('id', $tableId)->first()?->update([
                            'phone' => $input['phone'],
                            'type' => $input['phonetype']
                        ]);
                    } else {
                        clients_phone::where('id', $tableId)->first()?->delete();
                    }
                } else {
                    try {
                        if ($input['phone'] && $input['phonetype']) {
                            clients_phone::first()?->create([
                                'clients_id' => $this->key_id,
                                'phone' => $input['phone'],
                                'type' => $input['phonetype'],
                            ]);
                        }
                    } catch (Exception $e) {
                        if ($input['phone']) {
                            clients_phone::first()?->create([
                                'clients_id' => $this->key_id,
                                'phone' => $input['phone'],
                            ]);
                        }
                    }
                }
            }
        } elseif (count($this->inputs) > 0) {
            foreach ($this->inputs as $input) {
                try {
                    if ($input['phone'] && $input['phonetype']) {
                        clients_phone::first()?->create([
                            'clients_id' => $this->key_id,
                            'phone' => $input['phone'],
                            'type' => $input['phonetype'],
                        ]);
                    }
                } catch (Exception $e) {
                    if ($input['phone']) {
                        clients_phone::first()?->create([
                            'clients_id' => $this->key_id,
                            'phone' => $input['phone'],

                        ]);
                    }
                }
            }
        }

        // CompanyPhone::where('company_id',$this->key_id)->delete();
        // foreach ($this->inputs as $input) {

        //     if($input['companyphones'] && $input['companyphonestype']){
        //         CompanyPhone::create([
        //             'company_id'=> $this->key_id,
        //             'phone' => $input['companyphones'],
        //             'type' => $input['companyphonestype'],
        //         ]);
        //     }
        // }

        $arrEmail = clients_email::select('id', 'mail', 'type', 'clients_id')->where('clients_id', '=', $this->key_id)->get();

        if (count($arrEmail) > 0) {
            foreach ($this->emailinputs as $mail) {
                $flag = false;
                $tableId = 0;
                foreach ($arrEmail as $arr) {
                    try {
                        if ($mail['emailId'] == $arr->id) {
                            $flag = true;
                            $tableId = $arr->id;
                        }
                    } catch (Exception $e) {
                    }
                }
                if ($flag) {
                    if ($mail['email']) {
                        clients_email::where('id', $tableId)->first()?->update([
                            'mail' => $mail['email'],
                            'type' => $mail['emailtype']
                        ]);
                    } else {
                        clients_email::where('id', $tableId)->first()?->delete();
                    }
                } else {
                    try {
                        if ($mail['email'] && $mail['emailtype']) {
                            clients_email::first()?->create([
                                'clients_id' => $this->key_id,
                                'mail' => $mail['email'],
                                'type' => $mail['emailtype'],
                            ]);
                        }
                    } catch (Exception $e) {
                        if ($mail['email']) {
                            clients_email::first()?->create([
                                'clients_id' => $this->key_id,
                                'mail' => $mail['email'],
                            ]);
                        }
                    }
                }
            }
        } elseif (count($this->emailinputs) > 0) {
            foreach ($this->emailinputs as $mail) {
                try {
                    if ($mail['email'] && $mail['emailtype'] )  {
                        clients_email::first()?->create([
                            'clients_id' => $this->key_id,
                            'mail' => $mail['email'],
                            'type' => $mail['emailtype'],
                        ]);
                    }
                } catch (Exception $e) {
                    if ($mail['email']) {
                        clients_email::first()?->create([
                            'clients_id' => $this->key_id,
                            'mail' => $mail['email'],
                        ]);
                    }
                }
            }
        }


        // clients_email::where('clients_id',$this->key_id)->delete();
        // foreach($this->companymail as $companymail){
        //     if($companymail['companyemails'] && $companymail['companyemailstype']){
        //         CompanyEmail::create([
        //             'company_id'=>$this->key_id,
        //             'email'=>$companymail['companyemails'],
        //             'type'=>$companymail['companyemailstype']
        //         ]);
        //     }
        // }

        return redirect()->route('clients.index');
    }
}

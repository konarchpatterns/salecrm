<?php

namespace App\Http\Livewire;
use Livewire\Attributes\Validate;
use App\Models\Group;
use Redirect;
use Livewire\Component;

class Creategroup extends Component
{

    public $groupname = '';
    public $description = '';
    protected $rules = [
        'groupname' => 'required',
        'description' => 'required',
    ];


    public function save()
    {
        $this->validate();
        $count=Group::select('name')->where('name','=',$this->groupname)->count();
        if($count>0)
        {
            return $this->addError('error', 'this group is already exist.');


        }
        else{
        $insert=Group::create([
            "name"=>$this->groupname,
            "description"=>$this->description
            ]
        );
        return redirect()->route('groups.edit',['id'=>$insert->id]);
        //     ->with('status', 'Post successfully created.');
    }


        // return $this->redirect('/permissions')
        //     ->with('status', 'Post successfully created.');
    }
    public function render()
    {
        return view('livewire.creategroup');
    }
}

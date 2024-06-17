<?php

namespace App\Livewire;

use Livewire\Component;
use Redirect;

class Createdesignation extends Component
{
    public $name = '';

    public $description = '';
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public function save()
    {
        $this->validate();
        $count = Designation::select('name')->where('name', '=', $this->name)->count();
        if ($count > 0) {
            return $this->addError('error', 'this designation is already exist.');
        } else {
            $insert = Designation::create(
                [
                    "name" => $this->name,
                    "description" => $this->description
                ]
            );
            return redirect::route('users.index')
                ->with('success', 'designation successfully created.');
        }

        // return $this->redirect('/posts')
        //     ->with('status', 'Post successfully created.');
    }

    public function render()
    {
        return view('livewire.create-designation');
    }
}

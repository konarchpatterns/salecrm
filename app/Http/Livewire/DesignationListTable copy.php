<?php

namespace App\Http\Livewire;

use App\Models\Designation;
use App\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DesignationListTable extends LivewireDatatable
{
    public $model = Designation::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->searchable(),

            Column::name('name')->searchable(),

            Column::name('description')->searchable(),

            DateColumn::name('created_at')->searchable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('designation.action', ['id' => $id, 'name' => $name]);
            })->unsortable()
        ];
    }
}

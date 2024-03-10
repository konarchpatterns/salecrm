<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ActionsDemoTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->searchable(),

            Column::name('name')->searchable(),

            Column::name('email')->truncate()->searchable(),

            Column::name('assign_by')->searchable(),

            DateColumn::name('created_at'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('tables-actions', ['id' => $id, 'name' => $name]);
            })->unsortable()
        ];
    }
}

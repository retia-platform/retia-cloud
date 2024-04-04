<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TableFilterRadio extends Component
{
    #[Modelable]
    public $value;

    public string $label;

    public string $name;

    public function render()
    {
        return view('livewire.components.table-filter-radio');
    }
}

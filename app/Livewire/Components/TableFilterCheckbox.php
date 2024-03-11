<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TableFilterCheckbox extends Component
{
    #[Modelable]
    public $value;

    public string $label;

    public function render()
    {
        return view('livewire.components.table-filter-checkbox');
    }
}

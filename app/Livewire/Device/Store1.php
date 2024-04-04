<?php

namespace App\Livewire\Device;

use App\Traits\HasSessionError;
use Livewire\Component;

class Store1 extends Component
{
    use HasSessionError;

    public bool $hideInstruction = false;

    public function store()
    {
        return redirect()->route('devices.store2');
    }

    public function render()
    {
        return view('livewire.device.store-1');
    }
}

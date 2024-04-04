<?php

namespace App\Livewire\Device;

use App\Traits\HasDevice;
use App\Traits\HasSessionError;
use Livewire\Component;

class Store7 extends Component
{
    use HasDevice;
    use HasSessionError;

    public function mount()
    {
        $this->populateDevice();
    }

    public function render()
    {
        return view('livewire.device.store-7');
    }
}

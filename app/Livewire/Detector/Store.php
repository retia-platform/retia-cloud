<?php

namespace App\Livewire\Detector;

use App\Traits\HasSessionError;
use Livewire\Component;

class Store extends Component
{
    use HasSessionError;

    public function store()
    {
        return redirect()->route('detectors.store');
    }

    public function render()
    {
        return view('livewire.detector.store');
    }
}

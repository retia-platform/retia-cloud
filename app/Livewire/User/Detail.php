<?php

namespace App\Livewire\User;

use App\Traits\HasSessionError;
use Livewire\Component;

class Detail extends Component
{
    use HasSessionError;

    public string $name;

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.user.detail');
    }
}
<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class DependencyInformationModal extends Component
{
    public string $class;

    public string $title = '';

    public string $description = '';

    public string $url = '';

    public bool $showing = false;

    #[On('show-dependency-information-modal')]
    public function show(
        string $title,
        string $description,
        string $url,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->showing = true;
    }

    #[On('hide-dependency-information-modal')]
    public function hide()
    {
        $this->showing = false;
    }

    public function render()
    {
        return view('livewire.components.dependency-information-modal');
    }
}

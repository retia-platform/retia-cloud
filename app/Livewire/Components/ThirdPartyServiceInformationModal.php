<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class ThirdPartyServiceInformationModal extends Component
{
    public string $class;

    public string $title;

    public string $description;

    public string $documentationURL;

    public bool $showing = false;

    #[On('show-third-party-service-information-modal')]
    public function show(
        string $title,
        string $description,
        string $documentationURL,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->documentationURL = $documentationURL;
        $this->showing = true;
    }

    #[On('hide-third-party-service-information-modal')]
    public function hide()
    {
        $this->showing = false;
    }

    public function render()
    {
        return view('livewire.components.third-party-service-information-modal');
    }
}

<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ThirdPartyServiceInformationCard extends Component
{
    public string $class;

    public string $title;

    public string $overview;

    public string $description;

    public string $button;

    public string $url;

    public string $documentationURL;

    public function showModal()
    {
        $this->dispatch(
            'show-third-party-service-information-modal',
            title: $this->title,
            description: $this->description,
            documentationURL: $this->documentationURL
        );
    }

    public function hideModal()
    {
        $this->dispatch('hide-third-party-service-information-modal');
    }

    public function render()
    {
        return view('livewire.components.third-party-service-information-card');
    }
}

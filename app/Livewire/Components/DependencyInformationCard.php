<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DependencyInformationCard extends Component
{
    public string $class;

    public string $title;

    public string $description;

    public string $url;

    public string $version;

    public string $goVersion;

    public string $revision;

    public function showModal()
    {
        $this->dispatch(
            'show-dependency-information-modal',
            title: $this->title,
            description: $this->description,
            url: $this->url,
        );
    }

    public function hideModal()
    {
        $this->dispatch('hide-dependency-information-modal');
    }

    public function render()
    {
        return view('livewire.components.dependency-information-card');
    }
}

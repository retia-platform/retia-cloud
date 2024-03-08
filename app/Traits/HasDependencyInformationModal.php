<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait HasDependencyInformationModal
{
    public bool $showingDependencyInformationModal = false;

    public string $dependencyInformationModalTitle = '';

    public string $dependencyInformationModalDescription = '';

    public string $dependencyInformationModalURL = '';

    #[On('show-dependency-information-modal')]
    public function showDependencyInformationModal(
        string $title,
        string $description,
        string $url,
    ) {
        $this->dependencyInformationModalTitle = $title;
        $this->dependencyInformationModalDescription = $description;
        $this->dependencyInformationModalURL = $url;
        $this->showingDependencyInformationModal = true;
    }

    #[On('hide-dependency-information-modal')]
    public function hideDependencyInformationModal()
    {
        $this->showingDependencyInformationModal = false;
    }
}

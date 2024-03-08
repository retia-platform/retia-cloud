<?php

namespace App\Traits;

trait HasThirdPartyServiceInformationModal
{
    public bool $showingThirdPartyServiceInformationModal = false;

    public function showThirdPartyServiceInformationModal()
    {
        $this->showingThirdPartyServiceInformationModal = true;
    }

    public function hideThirdPartyServiceInformationModal()
    {
        $this->showingThirdPartyServiceInformationModal = false;
    }
}

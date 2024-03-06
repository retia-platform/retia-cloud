<?php

namespace App\Traits;

trait HasExportModal
{
    public bool $showingExportModal = false;

    public function showExportModal()
    {
        $this->showingExportModal = true;
    }

    public function hideExportModal()
    {
        $this->showingExportModal = false;
    }
}

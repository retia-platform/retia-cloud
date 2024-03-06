<?php

namespace App\Traits;

trait HasDeleteModal
{
    public bool $showingDeleteModal = false;

    public array $selectedDeleteItem = [];

    public function showDeleteModal(array $item)
    {
        $this->selectedDeleteItem = $item;
        $this->showingDeleteModal = true;
    }

    public function hideDeleteModal()
    {
        $this->showingDeleteModal = false;
    }
}

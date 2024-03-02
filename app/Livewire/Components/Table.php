<?php

namespace App\Livewire\Components;

use Illuminate\Support\Str;
use Livewire\Component;

class Table extends Component
{
    public string $title = 'Item';

    public string $pluralTitle = 'Items';

    public array $columns = [];

    public array $items = [];

    public string $detailRoute = '';

    public string $storeRoute = '';

    public string $updateRoute = '';

    public bool $actionable = true;

    public bool $deleteable = true;

    public bool $exportable = true;

    public bool $paginate = true;

    public function mount(
        string $title = 'Item',
        array $columns = [],
        array $items = [],
        string $detailRoute = 'login',
        string $storeRoute = 'login',
        string $updateRoute = 'login',
        bool $actionable = true,
        bool $deleteable = true,
        bool $exportable = true,
        bool $paginate = true,
    ) {
        $this->title = Str::singular($title);
        $this->pluralTitle = Str::plural($title);
        $this->columns = $columns;
        $this->items = $items;
        $this->detailRoute = $detailRoute;
        $this->storeRoute = $storeRoute;
        $this->updateRoute = $updateRoute;
        $this->actionable = $actionable;
        $this->deleteable = $deleteable;
        $this->exportable = $exportable;
        $this->paginate = $paginate;

        if ($this->deleteable === false && empty($this->updateRoute) && empty($this->detailRoute)) {
            $this->actionable = false;
        }
    }

    public function render()
    {
        return view('livewire.components.table');
    }
}

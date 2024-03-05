<?php

namespace App\Livewire\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component
{
    public string $title = 'Item';

    public string $pluralTitle = 'Items';

    public Collection $columns;

    public Collection $items;

    public string $detailRoute = '';

    public string $storeRoute = '';

    public string $updateRoute = '';

    public bool $actionable = true;

    public bool $deleteable = true;

    public bool $exportable = true;

    public bool $paginate = true;

    #[On('table-item-updated')]
    public function updateItems(array $items)
    {
        $this->items = collect($items);
    }

    public function mount(array $data)
    {
        $this->title = Str::singular($data['title']);
        $this->pluralTitle = Str::plural($data['title']);
        $this->columns = $data['columns'];
        $this->items = $data['items'] ?? collect();
        $this->detailRoute = $data['detailRoute'];
        $this->storeRoute = $data['storeRoute'];
        $this->updateRoute = $data['updateRoute'];
        $this->actionable = $data['actionable'];
        $this->deleteable = $data['deleteable'];
        $this->exportable = $data['exportable'];
        $this->paginate = $data['paginate'];

        if ($this->deleteable === false && empty($this->updateRoute) && empty($this->detailRoute)) {
            $this->actionable = false;
        }
    }

    public function render()
    {
        return view('livewire.components.table');
    }
}

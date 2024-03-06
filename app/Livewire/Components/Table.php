<?php

namespace App\Livewire\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Table extends Component
{
    public string $title = 'Item';

    public string $pluralTitle = 'Items';

    public Collection $columns;

    public Collection $items;

    public Collection $originalItems;

    public ?string $detailRoute = null;

    public ?string $storeRoute = null;

    public ?string $updateRoute = null;

    public bool $actionable = true;

    public bool $deleteable = true;

    public bool $exportable = true;

    public bool $paginate = true;

    public bool $showingExportModal = false;

    public bool $showingDeleteModal = false;

    public string $searchTerm = '';

    #[Validate('required|string|min:3|max:255')]
    public string $exportFileName = '';

    #[Validate('required|string|min:3|max:255')]
    public string $exportFileFormat = '';

    #[On('table-item-updated')]
    public function updateItems(array $items)
    {
        $this->syncItems($items);
    }

    public function export()
    {
        $this->exportFileFormat = match ($format = Str::lower($this->exportFileFormat)) {
            'xlsx', 'csv', 'pdf' => $format,
            default => 'xlsx',
        };

        $this->validate();

        $this->dispatch('table-exported', fileName: "{$this->exportFileName}.{$this->exportFileFormat}");

        $this->showingExportModal = false;
    }

    public function search()
    {
        $this->items = $this->originalItems;

        if (empty($this->searchTerm)) {
            return;
        }

        $this->items = $this->originalItems->filter(function ($row) {
            $row = collect($row)->filter(fn ($column) => Str::contains(Str::lower($column), Str::lower($this->searchTerm)));

            return $row->isNotEmpty();
        });
    }

    public function mount(array $data)
    {
        $this->title = Str::singular($data['title']);
        $this->pluralTitle = Str::plural($data['title']);
        $this->columns = $data['columns'];
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

        $this->exportFileName = Str::lower($this->pluralTitle);
        $this->syncItems($data['items'] ?? collect());
    }

    public function render()
    {
        return view('livewire.components.table');
    }

    private function syncItems(array|Collection $items)
    {
        $this->items = is_array($items) ? collect($items) : $items;
        $this->originalItems = is_array($items) ? collect($items) : $items;
    }
}

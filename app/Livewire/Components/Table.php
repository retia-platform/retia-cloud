<?php

namespace App\Livewire\Components;

use App\Traits\HasDeleteModal;
use App\Traits\HasExportModal;
use App\Traits\Searchable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Table extends Component
{
    use HasDeleteModal;
    use HasExportModal;
    use Searchable;

    public string $class;

    public string $title;

    public string $pluralTitle;

    public Collection $columns;

    public ?string $detailRoute = null;

    public ?string $storeRoute = null;

    public ?string $updateRoute = null;

    public bool $actionable = false;

    public bool $deleteable = false;

    public bool $exportable = false;

    public bool $paginate = false;

    #[Validate('required|string|min:3|max:255')]
    public string $exportFileName = '';

    #[Validate('required|string|min:3|max:255')]
    public string $exportFileFormat = '';

    #[On('table-item-updated')]
    public function updateItems(array $items)
    {
        $this->syncItems($items);
    }

    public function deleteItem()
    {
        $this->dispatch('table-item-deleted', item: $this->selectedDeleteItem);
        $this->hideDeleteModal();
    }

    public function export()
    {
        $format = 'xlsx';

        foreach (config('app.supported_export_file_formats') as $supportedFormat) {
            if (Str::lower($this->exportFileFormat) === Str::lower($supportedFormat)) {
                $format = Str::lower($supportedFormat);
                break;
            }
        }

        $this->validate();

        $this->dispatch('table-exported', fileName: "{$this->exportFileName}.{$format}");

        $this->hideExportModal();
    }

    public function mount(array $data)
    {
        $this->title = Str::singular($data['title']);
        $this->pluralTitle = Str::plural($data['title']);
        $this->exportFileName = Str::lower($this->pluralTitle);
        $this->columns = $data['columns'];
        $this->detailRoute = $data['detailRoute'] ?? null;
        $this->storeRoute = $data['storeRoute'] ?? null;
        $this->updateRoute = $data['updateRoute'] ?? null;
        $this->actionable = $data['actionable'] ?? false;
        $this->deleteable = $data['deleteable'] ?? false;
        $this->exportable = $data['exportable'] ?? false;
        $this->paginate = $data['paginate'] ?? false;

        if ($this->deleteable === false && empty($this->updateRoute) && empty($this->detailRoute)) {
            $this->actionable = false;
        }

        $this->syncItems($data['items'] ?? collect());
    }

    public function render()
    {
        $this->performSearch();

        return view('livewire.components.table', [
            'supportedExportFileFormats' => config('app.supported_export_file_formats'),
        ]);
    }
}

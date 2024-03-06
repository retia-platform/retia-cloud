<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait Searchable
{
    public Collection $items;

    public Collection $originalItems;

    public string $searchTerm = '';

    private function syncItems(array|Collection $items)
    {
        $this->items = is_array($items) ? collect($items) : $items;
        $this->originalItems = is_array($items) ? collect($items) : $items;
    }

    public function performSearch()
    {
        if ($this->needSearch()) {
            $this->search();
        } else {
            $this->resetSearch();
        }
    }

    public function search()
    {
        $this->items = $this->originalItems->filter(function ($row) {
            $row = collect($row)->filter(fn ($column) => Str::contains(Str::lower($column), Str::lower($this->searchTerm)));

            return $row->isNotEmpty();
        });
    }

    public function resetSearch()
    {
        $this->searchTerm = '';
        $this->items = $this->originalItems;
    }

    public function needSearch(): bool
    {
        return ! empty($this->searchTerm);
    }
}

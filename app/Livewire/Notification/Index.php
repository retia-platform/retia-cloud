<?php

namespace App\Livewire\Notification;

use App\Interfaces\TableComponent;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component implements TableComponent
{
    public array $filters = [
        'times' => 'today', // today, weekly, or monthly
    ];

    private Collection $notifications;

    public static function getTableColumns(): array
    {
        return [
            'Title',
            'Notified At',
        ];
    }

    public function getTableData(): array
    {
        return [
            'title' => 'Notification',
            'paginate' => true,
            'columns' => collect(self::getTableColumns()),
            'items' => $this->getTableItems(),
        ];
    }

    public function getTableItems(): Collection
    {
        return $this->notifications->map(function ($notification) {
            return [
                $notification->id,
                $notification->data['title'] ?? '',
                $notification->created_at->diffForHumans(),
            ];
        });
    }

    public function filter()
    {
        $this->notifications = auth()->user()->notifications->filter(function ($notification) {
            $createdAt = $notification->created_at;

            return
                ($this->filters['times'] === 'today' ? now()->isSameDay($createdAt) : false) ||
                ($this->filters['times'] === 'weekly' ? now()->isSameWeek($createdAt) : false) ||
                ($this->filters['times'] === 'monthly' ? now()->isSameMonth($createdAt) : false);
        });

        $this->dispatch('table-item-updated', items: $this->getTableItems());
    }

    public function mount()
    {
        $this->filter();
    }

    public function render()
    {
        return view('livewire.notification.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}

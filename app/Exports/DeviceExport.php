<?php

namespace App\Exports;

use App\Livewire\Device\Index;
use App\Models\Device;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DeviceExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    private Collection $devices;

    public function __construct(Collection $devices)
    {
        $this->devices = $devices;
    }

    public function collection(): Collection
    {
        return $this->devices;
    }

    public function properties(): array
    {
        return [
            'creator' => config('app.name'),
            'lastModifiedBy' => config('app.name'),
            'title' => 'Device Export',
            'description' => 'Exported device data from '.config('app.name'),
            'category' => 'Devices',
            'subject' => 'Devices',
            'keywords' => 'devices,export,spreadsheet',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50,
            'B' => 50,
            'C' => 50,
            'D' => 50,
            'E' => 50,
            'F' => 50,
        ];
    }

    public function headings(): array
    {
        return Index::getTableColumns();
    }

    public function map(Device $device): array
    {
        return [
            $device->name,
            $device->brand,
            $device->type,
            $device->ipAddress,
            $device->isRunning() ? 'Running' : 'Down',
            Date::dateTimeToExcel($device->createdAt),
        ];
    }
}

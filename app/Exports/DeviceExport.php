<?php

namespace App\Exports;

use App\Livewire\Device\Index;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DeviceExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping, WithStyles
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

    public function styles($sheet): array
    {
        return [
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return Index::getTableColumns();
    }

    public function map($device): array
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

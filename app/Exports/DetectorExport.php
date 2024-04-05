<?php

namespace App\Exports;

use App\Livewire\Detector\Index;
use App\Models\Detector;
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

class DetectorExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    private Collection $detectors;

    public function __construct(Collection $detectors)
    {
        $this->detectors = $detectors;
    }

    public function collection(): Collection
    {
        return $this->detectors;
    }

    public function properties(): array
    {
        return [
            'creator' => config('app.name'),
            'lastModifiedBy' => config('app.name'),
            'title' => 'Detector Export',
            'description' => 'Exported detector data from '.config('app.name'),
            'category' => 'Detectors',
            'subject' => 'Detectors',
            'keywords' => 'detectors,export,spreadsheet',
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

    public function map(Detector $Detector): array
    {
        return [
            $Detector->name,
            $Detector->brand,
            $Detector->type,
            $Detector->ipAddress,
            $Detector->isRunning() ? 'Running' : 'Down',
            Date::dateTimeToExcel($Detector->createdAt),
        ];
    }
}

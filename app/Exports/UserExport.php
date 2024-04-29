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

class UserExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    private Collection $users;

    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    public function collection(): Collection
    {
        return $this->users;
    }

    public function properties(): array
    {
        return [
            'creator' => config('app.name'),
            'lastModifiedBy' => config('app.name'),
            'title' => 'User Export',
            'description' => 'Exported user data from '.config('app.name'),
            'category' => 'Users',
            'subject' => 'Users',
            'keywords' => 'users,export,spreadsheet',
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
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return Index::getTableColumns();
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->role->name,
            Date::dateTimeToExcel($user->createdAt),
        ];
    }
}

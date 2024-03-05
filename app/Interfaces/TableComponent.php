<?php

namespace App\Interfaces;

interface TableComponent
{
    public static function getTableColumns(): array;

    public function getTableData(): array;
}

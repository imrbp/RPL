<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventoryExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    public function collection()
    {
        return Inventory::with('item')->get();
    }

    /* heading */
    public function headings(): array
    {
        return [
            '#',
            'name',
            'description',
            'level',
            'shelf',
            'quantity',
            'date_in',
            'date_out'
        ];
    }

    public function map($Inventory): array
    {
        return [
            $Inventory->id,
            $Inventory->item->name,
            $Inventory->item->description,
            $Inventory->level,
            $Inventory->shelf,
            $Inventory->item->quantity,
            $Inventory->date_in,
            $Inventory->date_out

        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
}

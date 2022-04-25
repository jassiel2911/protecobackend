<?php

namespace App\Exports;

use App\Models\TicketItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExportView implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TicketItem::all();
    }
}

<?php

namespace App\Exports;

use App\Models\TicketItem;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TicketItemExportView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
      public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoice::all()
        ]);
    }
}

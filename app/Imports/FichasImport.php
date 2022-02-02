<?php

namespace App\Imports;
use App\Models\Ficha;
use Maatwebsite\Excel\Concerns\ToModel;

class FichasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ficha([
            'file_ficha' => $row[0],
            'monto'    => $row[1],
        ]);
    }
}
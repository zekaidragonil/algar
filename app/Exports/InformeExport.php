<?php

namespace App\Exports;

use App\Models\informes_medicos;
use Maatwebsite\Excel\Concerns\FromCollection;

class InformeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return informes_medicos::all();
    }
}

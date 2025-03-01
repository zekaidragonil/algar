<?php

namespace App\Exports;

use App\Models\Citas;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Citas::all();
    }
}

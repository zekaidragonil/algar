<?php

namespace App\Exports;


use App\Models\recetas;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecetasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return recetas::all();
    }
}

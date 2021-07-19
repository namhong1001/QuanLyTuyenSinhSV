<?php

namespace App\Imports;

use App\Models\Nganh;
use Maatwebsite\Excel\Concerns\ToModel;

class NganhImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nganh([
            //
        ]);
    }
}

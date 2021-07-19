<?php

namespace App\Exports;

use App\Models\ChiTieu;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChiTieuExport implements FromCollection
{
    public function headings():array{
        return[
            'Năm học',
            'Ngành',
            'Chỉ tiêu',
            'Điểm sàn'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ChiTieu::select('namhoc','manganh','soluong','diemsan')->get();
    }
}

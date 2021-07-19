<?php

namespace App\Exports;

use App\Models\Nganh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NganhExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            'mã ngành',
            'tên ngành',
            'mã đào tạo',
            'Ngày tạo',
            'Ngày cập nhật'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nganh::all();

    }
}

<?php

namespace App\Exports;

use App\Models\HeDaoTao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HeDaoTaoExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            'mã hệ đào tạo',
            'tên hệ đào tạo',
            'Ngày tạo',
            'Ngày cập nhật'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HeDaoTao::all();

    }
}

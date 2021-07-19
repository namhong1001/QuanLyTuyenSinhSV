<?php

namespace App\Exports;

use App\Models\DiemChuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class DiemChuanExport implements FromCollection
{
    public function headings():array{
        return[
            'Năm học',
            'Phương thức',
            'Ngành',
            'Điểm chuẩn'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DiemChuan::join('phuongthucxettuyen','diemchuan.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                        ->join('nganh','diemchuan.manganh','=','nganh.manganh')
                        ->select('namhoc','phuongthucxettuyen.tenphuongthuc','nganh.tennganh','diemchuan')->get();
    }
}

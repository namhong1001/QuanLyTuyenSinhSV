<?php

namespace App\Exports;

use App\Models\KetQuaTuyenSinh;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChiTietNguyenVongTheoNganhExport implements FromCollection
{
    public function __construct(String $n = null)
    {
        $this->n = $n;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
        ->where('nganh.manganh','=',$this->n)
        ->select('hoso.mahoso','hoso.hoten','phuongthucxettuyen.tenphuongthuc','manguyenvong','nganh.tennganh','khoithi.tenkhoi','tongdiem')
        ->get();
    }
}

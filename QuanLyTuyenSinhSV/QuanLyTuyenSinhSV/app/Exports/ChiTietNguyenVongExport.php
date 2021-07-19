<?php

namespace App\Exports;

use App\Models\KetQuaTuyenSinh;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChiTietNguyenVongExport implements FromCollection
{
    public function __construct(String $pt = null)
    {
        $this->pt = $pt;
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
                            ->where('hoso_phuongthuc.maphuongthuc','=',$this->pt)
                            ->select('hoso.mahoso','hoso.hoten','phuongthucxettuyen.tenphuongthuc','manguyenvong','nganh.tennganh','khoithi.tenkhoi','tongdiem')
                            ->get();

           

    }
}

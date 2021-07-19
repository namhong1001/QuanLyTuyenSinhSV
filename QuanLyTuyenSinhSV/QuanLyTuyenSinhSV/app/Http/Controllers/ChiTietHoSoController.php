<?php

namespace App\Http\Controllers;

use App\Models\HoSo;
use Illuminate\Http\Request;
use App\Models\HoSo_PhuongThuc;
use App\Models\KetQuaTuyenSinh;
use App\Models\ChonToHop;
use App\Models\ChiTietDiem;
use App\Models\NhatKyDuyet;

class ChiTietHoSoController extends Controller
{
    public function getchitiet($mahoso){
        $nhatky = NhatKyDuyet::where('mahoso',$mahoso)->get();
        $hoso = HoSo::find($mahoso);
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();

        $a = [];
        foreach($phuongthuc as $item){
            array_push($a,$item->maphuongthuc);
        }

        if(isset($a[0])){
            $pt1 = $a[0];
        }
        if(isset($a[1])){
            $pt2 = $a[1];
        }
        if(isset($a[2])){
            $pt3 = $a[2];
        }
        if(isset($a[3])) {
            $pt4 = $a[3];
        }

        if(isset($pt1)){
            $tohop = ChonToHop::where('mahoso',$mahoso)->get();
            $kqts1 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts1 = [];
            $tohop = [];
        }

        if(isset($pt2)){
            $kqts2 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            $diem2 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts2 = [];
            $diem2 = [];
        }

        if(isset($pt3)){
            $kqts3 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts3 = [];
        }

        if(isset($pt4)){
            $kqts4 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            $diem4 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts4 = [];
            $diem4 = [];
        }


        //hiển thị điểm thi nếu có thi thpt
        foreach($phuongthuc as $item){
            if($item->maphuongthuc == 1){
                $mahspt = $item->mahspt;
            }
        }

        if(isset($mahspt)){
            $diem = ChiTietDiem::where('mahspt',$mahspt)->get();
        } else {
            $diem=[];
        }

        $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })
                            ->where('hoso.mahoso','=',$mahoso)
                            ->select('nganh.tennganh', 'phuongthucxettuyen.tenphuongthuc')->distinct()->get();


        return view('chitiethoso',['kq'=>$kq, 'diem'=>$diem, 'nhatky'=>$nhatky, 'hoso'=>$hoso, 'phuongthuc'=>$phuongthuc, 'tohop'=>$tohop, 'kqts1'=>$kqts1, 'kqts2'=>$kqts2, 'kqts3'=>$kqts3, 'kqts4'=>$kqts4, 'diem2'=>$diem2, 'diem4'=>$diem4]);
    }
}

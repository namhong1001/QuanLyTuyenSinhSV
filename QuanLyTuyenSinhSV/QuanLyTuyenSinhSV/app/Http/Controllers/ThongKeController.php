<?php

namespace App\Http\Controllers;

use App\Models\KetQuaTuyenSinh;
use App\Models\PhuongThuc;
use App\Models\Nganh;
use App\Models\ThongKe;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getlist(){
        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();

        foreach($phuongthuc as $pt){
            foreach($nganh as $n){
                //số lượng đăng ký
                $kqts = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                        ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                        ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                        ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                                        ->where('phuongthucxettuyen.maphuongthuc',$pt->maphuongthuc)
                                        ->where('ketquatuyensinh.manganh',$n->manganh)
                                        ->count();
                ThongKe::where([['maphuongthuc',$pt->maphuongthuc], ['manganh',$n->manganh]])->update(['soluongdangky'=>$kqts]);

                //số lượng trúng tuyển
                $kqtt = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                        ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                        ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                        ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                                        ->where('ketquatuyensinh.manganh',$n->manganh)
                                        ->where('phuongthucxettuyen.maphuongthuc',$pt->maphuongthuc)
                                        ->join('diemchuan', function($join){
                                            $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                                ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                                ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                                        })->count();
                $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->where('phuongthucxettuyen.maphuongthuc',3)->where('manganh',$n->manganh)
                            ->where('phuongthucxettuyen.maphuongthuc',$pt->maphuongthuc)
                            ->count();
                $sltt = $kqtt + $tuyenthang;
                ThongKe::where([['maphuongthuc',$pt->maphuongthuc], ['manganh',$n->manganh]])->update(['soluongtrungtuyen'=>$sltt]);
            }
        }

        $totaldangky = ThongKe::sum('soluongdangky');
        $totaltrungtuyen = ThongKe::sum('soluongtrungtuyen');

        $thongke = ThongKe::all();

        return view('qlts.thongke',['thongke'=>$thongke, 'totaldangky'=>$totaldangky, 'totaltrungtuyen'=>$totaltrungtuyen]);
    }
}

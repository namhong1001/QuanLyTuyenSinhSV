<?php

namespace App\Http\Controllers;

use App\Models\ChiTieu;
use App\Models\DiemChuan;
use App\Models\KetQuaTuyenSinh;
use App\Models\Nganh;
use App\Models\PhanTramChiTieu;
use App\Models\PhuongThuc;
use Illuminate\Http\Request;

class DiemChuanController extends Controller
{
    public function getlistdiemchuan(){
        $nganh = Nganh::all();
        $phuongthuc = PhuongThuc::all();
        $arrpt = [1,4,2];
        foreach($nganh as $ng){
            foreach($arrpt as $pt){
                //lấy điểm sàn
                $diemsan = ChiTieu::where('manganh',$ng->manganh)->first();

                //lấy phần trăm của phương thức đó
                $phantram = PhanTramChiTieu::where('maphuongthuc',$pt)->first();
                $phantramchitieu = $phantram->phantramchitieu;

                //lấy chỉ tiêu
                $ct = ChiTieu::where('manganh',$ng->manganh)->first();
                $chitieu1 = $ct->soluong;

                //nếu ngành đó có người đăng ký tuyển thẳng
                $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)->where('manganh',$ng->manganh)
                                            ->exists();

                if($tuyenthang == true){
                    $soluongtuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                                        ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                                        ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                                        ->where('phuongthucxettuyen.maphuongthuc',3)->where('manganh',$ng->manganh)
                                                        ->count();
                    $chitieu = $chitieu1 - $soluongtuyenthang;
                }else {
                    $chitieu = $chitieu1;
                }

                //tính số lượng thí sinh theo phương thức và phần trăm chỉ tiêu
                $sl = ceil($chitieu * $phantramchitieu / 100);

                //sắp xếp giảm dần
                $dc = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                    ->where('manganh',$ng->manganh)->where('phuongthucxettuyen.maphuongthuc',$pt)
                                    ->orderBy('tongdiem','desc')->orderBy('ketquatuyensinh.manguyenvong','asc')->limit($sl)->get();

                $dc1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                    ->where('manganh',$ng->manganh)->where('phuongthucxettuyen.maphuongthuc',$pt)
                                    ->orderBy('tongdiem','desc')->orderBy('ketquatuyensinh.manguyenvong','asc')->limit($sl)->exists();
                if($dc1 == false){
                    $diem = $diemsan->diemsan;
                } else{
                    if ($dc->count() >= $sl){
                        foreach($dc as $item){
                            $diem = $item->tongdiem;
                        }
                    }else{
                        $diem = $diemsan->diemsan;
                    }

                    //if $dc->count() < $sl

                    // if($diem < $diemsan->diemsan){
                    //     $diem = $diemsan->diemsan;
                    // }
                }
                DiemChuan::where([['manganh',$ng->manganh], ['maphuongthuc',$pt]])->update(['diemchuan'=>$diem]);
            }
        }



        $diemchuan = DiemChuan::all();
        return view('qlts.quanlydiemchuan.listdiemchuan',['diemchuan'=>$diemchuan, 'phuongthuc'=> $phuongthuc, 'nganh'=>$nganh]);
    }

    public function getadddiemchuan(){
        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();
        return view('qlts.quanlydiemchuan.adddiemchuan',['nganh'=>$nganh, 'phuongthuc'=>$phuongthuc]);
    }

    public function postadddiemchuan(Request $request){
        $this->validate($request,
        [

        ],
        [

        ]);

        $diemchuan = new DiemChuan;
        $diemchuan->namhoc = $request->namhoc;
        $diemchuan->manganh = $request->manganh;
        $diemchuan->maphuongthuc = $request->maphuongthuc;
        $diemchuan->diemchuan = $request->diemchuan;

        $diemchuan->save();

        return redirect('qlts/quanlydiemchuan/adddiemchuan')->with('thongbao','Thêm thành công');
    }
}

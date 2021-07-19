<?php

namespace App\Http\Controllers;

use App\Models\HoSo;
use Illuminate\Http\Request;
use App\Models\MonThi;
use App\Models\HoSo_PhuongThuc;
use App\Models\KetQuaTuyenSinh;
use App\Models\ChiTietDiem;
use Illuminate\Support\Str;

class ChinhSuaHoSoController extends Controller
{
    public function getchinhsuahoso($mahoso){
        $hoso = HoSo::find($mahoso);
        $mon = MonThi::all();
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();
        foreach($phuongthuc as $item){
            $pt = $item->maphuongthuc;
            if($pt == 1){
                $kqts1 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            } else{
                $kqts1 = [];
            }

            if($pt == 2){
                $kqts2 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
                $diem2 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
            } else{
                $kqts2 = [];
                $diem2 = [];
            }

            if($pt == 3){
                $kqts3 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            } else{
                $kqts3 = [];
            }

            if($pt == 4){
                $kqts4 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
                $diem4 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
            } else{
                $kqts4 = [];
                $diem4 = [];
            }
        }

        return view('chinhsuahoso',['mon'=>$mon,'hoso'=>$hoso, 'kqts1'=>$kqts1, 'kqts2'=>$kqts2, 'kqts3'=>$kqts3, 'kqts4'=>$kqts4, 'diem2'=>$diem2, 'diem4'=>$diem4]);
    }

    public function error(){
        return view('error');
    }

    public function postchinhsuahoso(Request $request, $mahoso){
        $hoso = HoSo::where('mahoso',$mahoso)->first();
        $hoso->hoten = $request->hoten;
        $hoso->gioitinh = $request->gioitinh;
        $hoso->ngaysinh = $request->ngaysinh;
        $hoso->noisinh = $request->noisinh;
        $hoso->dantoc = $request->dantoc;
        $hoso->quoctich = $request->quoctich;
        $hoso->socmnd = $request->cmnd;
        $hoso->hokhauthuongtru = $request->hokhauthuongtru;
        $hoso->lop10 = $request->lop10;
        $hoso->lop11 = $request->lop11;
        $hoso->lop12 = $request->lop12;
        $hoso->tenlop12 = $request->tenlop12;
        $hoso->dienthoai = $request->dienthoai;
        $hoso->email = $request->email;
        $hoso->hotennguoilienhe = $request->tennguoilienhe;
        $hoso->diachinguoilienhe = $request->diachinguoilienhe;
        $hoso->dienthoainguoilienhe = $request->dienthoainguoilienhe;
        $hoso->mahoidongthi = $request->mahoidongthi;
        $hoso->madonvidkxt = $request->madonvidkxt;
        $hoso->doituong = $request->doituong;
        $hoso->makhuvuc = $request->makhuvuc;
        $hoso->namtotnghiep = $request->namtotnghiep;

        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi=='png' && $duoi=='jpg' && $duoi='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4).'-'.$name;

            $file->move("upload/hoso/",$hinh);
            //unlink("upload/hoso/".$hoso->hinhanh);

            $hoso->hinhanh = $hinh;
        }


        if($request->hasFile('imgcmndtruoc')){
            $file1 = $request->file('imgcmndtruoc');
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1=='png' && $duoi1=='jpg' && $duoi1='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name1 = $file1->getClientOriginalName();
            $imgcmndtruoc = Str::random(4).'-'.$name1;

            $file1->move("upload/hoso/",$imgcmndtruoc);
            //unlink("upload/hoso/".$hoso->hinhanh);

            $hoso->imgcnmdtruoc = $imgcmndtruoc;
        }

        if($request->hasFile('imgcmndsau')){
            $file2 = $request->file('imgcmndsau');
            $duoi2 = $file2->getClientOriginalExtension();
            if($duoi2=='png' && $duoi2=='jpg' && $duoi2='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name2 = $file2->getClientOriginalName();
            $imgcmndsau = Str::random(4).'-'.$name2;

            $file2->move("upload/hoso/",$imgcmndsau);
            //unlink("upload/hoso/".$hoso->hinhanh);

            $hoso->imgcmndsau = $imgcmndsau;
        }

        $hoso->save();

        return redirect('chinhsuahoso/'.$hoso->mahoso)->with('thongbao','Đã cập nhật hồ sơ thành công');

    }
}

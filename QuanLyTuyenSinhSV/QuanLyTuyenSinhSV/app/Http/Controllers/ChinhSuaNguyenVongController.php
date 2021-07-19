<?php

namespace App\Http\Controllers;

use App\Models\HoSo;
use Illuminate\Http\Request;
use App\Models\HoSo_PhuongThuc;
use App\Models\KetQuaTuyenSinh;
use App\Models\ChonToHop;
use App\Models\ChiTietDiem;
use App\Models\Khoi;
use App\Models\Nganh;
use App\Models\NhatKyDuyet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChinhSuaNguyenVongController extends Controller
{
    public function getchinhsuanguyenvong($mahoso){
        $nhatky = NhatKyDuyet::where('mahoso',$mahoso)->get();
        $nganh = Nganh::all();
        $khoi = Khoi::all();
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


        return view('chinhsuanguyenvong',['diem'=>$diem, 'nganh'=>$nganh, 'khoi'=>$khoi, 'nhatky'=>$nhatky, 'hoso'=>$hoso, 'phuongthuc'=>$phuongthuc, 'tohop'=>$tohop, 'kqts1'=>$kqts1, 'kqts2'=>$kqts2, 'kqts3'=>$kqts3, 'kqts4'=>$kqts4, 'diem2'=>$diem2, 'diem4'=>$diem4]);
    }

    public function postchinhsuanguyenvong($mahoso, Request $request){
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();
        foreach($phuongthuc as $item){
            $pt = $item->maphuongthuc;
            //TH thi THPT
            if($pt == 1){
                $mahspt = $item->mahspt;
                //xóa nguyện vọng cũ
                $kqts = KetQuaTuyenSinh::find($mahspt);
                $kqts->delete();

                //thêm nguyện vọng mới
                foreach($request->manguyenvong1 as $key=>$manguyenvong1){
                    $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh1[$key]],['makhoi',$request->makhoi1[$key]]])->first();
                    if($nganhkhoi===null){
                        echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                    } else{
                        $kqts = new KetQuaTuyenSinh;
                        $kqts->mahspt = $mahspt;
                        $kqts->manguyenvong = $manguyenvong1;
                        $kqts->manganh = $request->manganh1[$key];
                        $kqts->makhoi = $request->makhoi1[$key];
                        $kqts->save();
                    }

                }
            }

            //Học bạ
            if($pt == 2){
                $mahspt = $item->mahspt;
                 //xóa nguyện vọng cũ
                 $kqts = KetQuaTuyenSinh::find($mahspt);
                 $kqts->delete();

                 //thêm nguyện vọng mới
                foreach($request->manguyenvong2 as $key=>$manguyenvong2){
                    $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh2[$key]],['makhoi',$request->makhoi2[$key]]])->first();
                    if($nganhkhoi===null){
                        echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                    } else{
                        $kqts = new KetQuaTuyenSinh;
                        $kqts->mahspt = $mahspt;
                        $kqts->manguyenvong = $manguyenvong2;
                        $kqts->manganh = $request->manganh2[$key];
                        $kqts->makhoi = $request->makhoi2[$key];
                        $kqts->save();
                    }
                }
            }

            //Tuyển thẳng
            if($pt == 3){
                $mahspt = $item->mahspt;
                //xóa nguyện vọng cũ
                $kqts = KetQuaTuyenSinh::find($mahspt);
                $kqts->delete();

                //thêm nguyện vọng mới
                foreach($request->manguyenvong3 as $key=>$manguyenvong3){
                    $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh3[$key]],['makhoi',$request->makhoi3[$key]]])->first();
                    if($nganhkhoi===null){
                        echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                    } else{
                        $kqts = new KetQuaTuyenSinh;
                        $kqts->mahspt = $mahspt;
                        $kqts->manguyenvong = $manguyenvong3;
                        $kqts->manganh = $request->manganh3[$key];
                        $kqts->makhoi = $request->makhoi3[$key];
                        $kqts->save();
                    }
                }
            }

            //Thi năng lực quốc gia
            if($pt == 4){
                $mahspt = $item->mahspt;
                //xóa nguyện vọng cũ
                $kqts = KetQuaTuyenSinh::find($mahspt);
                $kqts->delete();

                //thêm nguyện vọng mới
                foreach($request->manguyenvong4 as $key=>$manguyenvong4){
                    $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh4[$key]],['makhoi',$request->makhoi4[$key]]])->first();
                    if($nganhkhoi===null){
                        echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                    } else{
                        $kqts = new KetQuaTuyenSinh;
                        $kqts->mahspt = $mahspt;
                        $kqts->manguyenvong = $manguyenvong4;
                        $kqts->manganh = $request->manganh4[$key];
                        $kqts->makhoi = $request->makhoi4[$key];
                        $kqts->save();
                    }
                }
            }

        }
    }
}

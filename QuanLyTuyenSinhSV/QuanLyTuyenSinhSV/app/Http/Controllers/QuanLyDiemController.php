<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDiem;
use App\Models\ChonToHop;
use App\Models\HoSo;
use App\Models\HoSo_PhuongThuc;
use App\Models\MonThi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLyDiemController extends Controller
{
    public function getnhapdiem($mahoso){
        $hoso = HoSo::find($mahoso);
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();



        $tohop = ChonToHop::where('mahoso',$mahoso)->get();
        $m = [];
        $mamon = [];
         foreach($tohop as $item){
             $mon = MonThi::where('matohop',$item->matohop)->get();
            foreach($mon as $items){
                array_push($m,$items->tenmon);
            }
         }

         foreach($tohop as $item){
            $mon = MonThi::where('matohop',$item->matohop)->get();
           foreach($mon as $items){
               array_push($mamon,$items->mamon);
           }
        }

        //lấy điểm trong database
        // $ctdiem = [];
        // $mm = [];

        foreach($phuongthuc as $item){
            if($item->maphuongthuc == 1){
                $mahspt = $item->mahspt;
            }

            // foreach($diem as $d){
            //     array_push($mm,$d->mamon);
            //     array_push($ctdiem,$d->diem);
            // }
        }
        $diem = ChiTietDiem::where('mahspt',$mahspt)->get();


        // $chitietdiem = array_combine($mm,$ctdiem);

        //dd($chitietdiem);



        return view('qlts.quanlydiem.nhapdiem',['hoso'=>$hoso, 'mon'=>$m, 'mamon'=>$mamon, 'diem'=>$diem]);
    }

    public function postnhapdiem(Request $request, $mahoso){
        $hoso = HoSo::find($mahoso);
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();
        $tohop = ChonToHop::where('mahoso',$mahoso)->get();

        $mamon = [];

        foreach($tohop as $item){
            $mon = MonThi::where('matohop',$item->matohop)->get();
           foreach($mon as $items){
               array_push($mamon,$items->mamon);
           }
        }

        $diemarr = array_combine($mamon,$request->diem);

        foreach($phuongthuc as $item){
            $p = $item->maphuongthuc;
            if($p == 1){
                 $chitietdiem = ChiTietDiem::where('mahspt',$item->mahspt)->get();

                 foreach ($diemarr as $key => $value){
                    foreach($chitietdiem as $ct){
                        //dd($chitietdiem->toArray());
                            $ct->where([['mamon',"=",$key],['mahspt','=',$item->mahspt],])->update(['diem'=>$value]);

                    }
                 }
            }
        }

        foreach($phuongthuc as $hspt){
            $kqts = DB::table('ketquatuyensinh')->where('mahspt',$hspt->mahspt)->get();
            foreach($kqts as $ts){
                $khoimon = DB::table('chitietchonkhoimon')->where('makhoi',$ts->makhoi)->get();
                foreach($khoimon as $km){
                    $chitietdiem = DB::table('chitietdiem')->where([['mahspt',$hspt->mahspt],['mamon',$km->mamon],])->get();

                    foreach($chitietdiem as $ctd){
                         echo $ctd->mahspt ." - ".$km->makhoi." - ".$ctd->mamon." - ".$ctd->diem."<br>";
                        $diem = DB::table('chitietdiem')
                                ->selectRaw('sum(diem) as tongdiem, chitietchonkhoimon.makhoi')
                                ->where('chitietdiem.mahspt',$hspt->mahspt)
                                ->join('chitietchonkhoimon','chitietdiem.mamon','=','chitietchonkhoimon.mamon')
                                ->groupBy('makhoi')
                                ->having('chitietchonkhoimon.makhoi','=',$km->makhoi)
                                ->get();
                    }
                }
                $array = json_decode(json_encode($diem), True);

                //update tổng điểm
                foreach($array as $k => $v){
                    echo $v['tongdiem']."<br>";
                    DB::table('ketquatuyensinh')->where([['mahspt',$hspt->mahspt],['makhoi',$km->makhoi],])->update(['tongdiem'=>$v['tongdiem']]);
                }

            }
        }


        return redirect('qlts/quanlydiem/nhapdiem/'.$mahoso)->with('thongbao','Bạn đã thêm điểm thành công');
    }
}

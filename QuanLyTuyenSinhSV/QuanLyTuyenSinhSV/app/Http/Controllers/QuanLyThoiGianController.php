<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;

class QuanLyThoiGianController extends Controller
{
    public function getthoigian(){
        $att = Attribute::all();
        foreach($att as $item){
            if($item->loaiattribute == "btnDangKyHoSo"){
                $dk = $item->giatri;
            }
            if($item->loaiattribute == "btnChinhSuaHoSo"){
                $cs = $item->giatri;
            }
            if($item->loaiattribute == "dotxettuyen"){
                $xt = $item->giatri;
            }
            if($item->loaiattribute == "btnChinhSuaNguyenVong"){
                $nv = $item->giatri;
            }
        }
        return view('qlts.quanlythoigian.thoigian',['dk'=>$dk, 'cs'=>$cs, 'xt'=>$xt, 'nv'=>$nv]);
    }

    public function postthoigian(Request $request){
        if(isset($request->dangkyhoso)){
            DB::table('attribute')->where('loaiattribute','btnDangKyHoSo')->update(['giatri'=>$request->dangkyhoso]);
        }

        if(isset($request->chinhsuahoso)){
            DB::table('attribute')->where('loaiattribute','btnChinhSuaHoSo')->update(['giatri'=>$request->chinhsuahoso]);
        }

        if(isset($request->dotxettuyen)){
            DB::table('attribute')->where('loaiattribute','dotxettuyen')->update(['giatri'=>$request->dotxettuyen]);
        }

        if(isset($request->chinhsuanguyenvong)){
            DB::table('attribute')->where('loaiattribute','btnChinhSuaNguyenVong')->update(['giatri'=>$request->chinhsuanguyenvong]);
        }

        return redirect('qlts/quanlythoigian/thoigian')->with('thongbao','Bạn đã yêu cầu thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PhanTramChiTieu;
use Illuminate\Http\Request;

class PhanTramChiTieuController extends Controller
{
    public function getlistphantramchitieu(){
        $phantramct = PhanTramChiTieu::all();
        
        return view('qlts.quanlydiemchuan.listphantramchitieu',['phantramct'=>$phantramct]);
    }

    public function geteditphantramchitieu($id){
        $phantramct = PhanTramChiTieu::where('id',$id)->first();
        return view('qlts.quanlydiemchuan.editphantramchitieu',['phantramct'=>$phantramct]);
    }

    public function posteditphantramchitieu(Request $request, $id){
        $phantramct = PhanTramChiTieu::where('id',$id)->first();
        $this->validate($request,
        [

        ],
        [

        ]);

        $phantramct->maphuongthuc = $request->maphuongthuc;
        $phantramct->phantramchitieu = $request->phantramchitieu;

        $phantramct->save();
        return redirect('qlts/quanlydiemchuan/editphantramchitieu/'.$id)->with('thongbao',"Đã sửa phần trăm chỉ tiêu thành công");
    }
}

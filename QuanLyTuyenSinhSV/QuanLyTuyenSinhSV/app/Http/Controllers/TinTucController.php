<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\Comment;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    public function getlist(){
        $tintuc = TinTuc::all();
        return view('admin.tintuc.list',['tintuc'=>$tintuc]);
    }

    public function getadd(){
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.add',['loaitin'=>$loaitin]);
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'LoaiTin'=>'required',
            'TieuDe'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required',

        ],
        [
            'LoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);

        $tintuc = new TinTuc;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->SoLuotXem = 0;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'PNG' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tintuc/add')->with('loi','Bạn chỉ được chọn file có đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc",$hinh);
            $tintuc->Hinh = $hinh;
        }
        else{
            $tintuc->Hinh = "";
        }
        $tintuc->NoiBat = $request->NoiBat;

        $tintuc->save();

        return redirect('admin/tintuc/add')->with('thongbao','Bạn đã thêm tin tức thành công');
    }

    public function getedit($id){
        $tintuc = TinTuc::find($id);
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.edit',['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    public function postedit(Request $request, $id){
        $this->validate($request,
        [
            'TieuDe'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'LoaiTin'=>'required',
        ],
        [

        ]);

        $tintuc = TinTuc::find($id);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi=='png' && $duoi=='jpg' && $duoi='jpeg'){
                return redirect('admin/tintuc/edit')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4).'-'.$name;

            $file->move("upload/tintuc",$hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $hinh;
        }
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->save();
        return redirect('admin/tintuc/edit/'.$id)->with('thongbao','Bạn đã sửa tin tức thành công');

    }

    public function postdelete($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/list')->with('thongbao','Bạn đã xóa tin tức thành công');
    }
}

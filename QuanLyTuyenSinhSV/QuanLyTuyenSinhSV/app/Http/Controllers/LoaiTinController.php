<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;

class LoaiTinController extends Controller
{
    public function getlist(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.list',['loaitin'=>$loaitin]);
    }

    public function getadd(){
        return view('admin.loaitin.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:loaitin,Ten|min:3|max:200',
        ],
        [
            'Ten.require'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 200 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 200 kí tự',
        ]);

        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->save();

        return redirect('admin/loaitin/add')->with('thongbao','Đã thêm loại tin thành công');
    }

    public function getedit($id){
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.edit',['loaitin'=>$loaitin]);
    }

    public function postedit(Request $request,$id){
        $loaitin = LoaiTin::find($id);
        $this->validate($request,
        [
            'Ten'=>'required|unique:loaitin,Ten|min:3|max:200',
        ],
        [
            'Ten.require'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 200 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 200 kí tự',
        ]);

        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);

        $loaitin->save();

        return redirect('admin/loaitin/edit/'.$id)->with('thongbao','Bạn sửa loại tin thành công');
    }

    public function getdelete($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/list')->with('thongbao','Bạn đã xóa thành công');
    }
}

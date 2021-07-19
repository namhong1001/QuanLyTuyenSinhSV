<?php

namespace App\Http\Controllers;

use App\Models\HoiDongThi;
use Illuminate\Http\Request;

class HoiDongThiController extends Controller
{
    public function getlist(){
        $hdt = HoiDongThi::all();
        return view('admin.hoidongthi.list',['hdt'=>$hdt]);
    }

    public function getadd(){
        return view('admin.hoidongthi.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:hoidongthi,tenhoidongthi|min:3|max:100'
        ],
        [
            'Ten.unique'=>'Tên hội đồng thi đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên hội đồng thi',
            'Ten.min'=>'Tên hội đồng thi phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên hội đồng thi phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $hdt = new HoiDongThi;
        $hdt->mahoidongthi = $request->Ma;
        $hdt->tenhoidongthi = $request->Ten;

        $hdt->save();

        return redirect('admin/hoidongthi/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($mahoidongthi){
        //$hdt = HeDaoTao::find($mahedaotao);
        $hdt = HoiDongThi::where('mahoidongthi',$mahoidongthi)->first();
        return view('admin.hoidongthi.edit',['hdt'=>$hdt]);
    }

    public function postedit(Request $request,$mahoidongthi){
        //$hdt = HeDaoTao::find($mahedaotao);
        $hdt = HoiDongThi::where('mahoidongthi',$mahoidongthi)->first();
        $this->validate($request,
        [
            'Ten'=>'required|unique:hoidongthi,tenhoidongthi|min:3|max:100'
        ],
        [

            'Ten.required'=>'Bạn chưa nhập tên hội đồng thi',
            'Ten.min'=>'Tên hội đồng thi phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên hội đồng thi phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $hdt->mahoidongthi = $request->Ma;
        $hdt->tenhoidongthi = $request->Ten;

        $hdt->save();
        return redirect('admin/hoidongthi/edit/'.$mahoidongthi)->with('thongbao',"Đã sửa hội đồng thi thành công");
    }

    public function postdelete($mahoidongthi){
        $hdt = HoiDongThi::find($mahoidongthi);
        $hdt->delete();
        return redirect('admin/hoidongthi/list')->with('thongbao','Bạn đã xóa thành công');
    }
}

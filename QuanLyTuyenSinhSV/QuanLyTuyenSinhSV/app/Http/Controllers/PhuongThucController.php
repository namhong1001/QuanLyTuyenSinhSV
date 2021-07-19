<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhuongThuc;

class PhuongThucController extends Controller
{
    public function getlist(){
        $phuongthuc = PhuongThuc::all();
        return view('admin.phuongthuc.list',['phuongthuc'=>$phuongthuc]);
    }

    public function getadd(){
        return view('admin.phuongthuc.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100'
        ],
        [

            'Ten.required'=>'Bạn chưa nhập tên phương thức',
            'Ten.min'=>'Tên phương thức phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên phương thức phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $phuongthuc = new PhuongThuc;
        $phuongthuc->tenphuongthuc = $request->Ten;

        $phuongthuc->save();

        return redirect('admin/phuongthuc/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($maphuongthuc){
        //$hdt = HeDaoTao::find($mahedaotao);
        $phuongthuc = PhuongThuc::where('maphuongthuc',$maphuongthuc)->first();
        return view('admin.phuongthuc.edit',['phuongthuc'=>$phuongthuc]);
    }

    public function postedit(Request $request,$maphuongthuc){
        //$hdt = HeDaoTao::find($mahedaotao);
        $phuongthuc = PhuongThuc::where('maphuongthuc',$maphuongthuc)->first();
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100'
        ],
        [

            'Ten.required'=>'Bạn chưa nhập tên phương thức',
            'Ten.min'=>'Tên phương thức phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên phương thức phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $phuongthuc->tenphuongthuc = $request->Ten;

        $phuongthuc->save();
        return redirect('admin/phuongthuc/edit/'.$maphuongthuc)->with('thongbao',"Đã sửa thể loại thành công");
    }

    public function postdelete($maphuongthuc){
        $phuongthuc = PhuongThuc::find($maphuongthuc);
        $phuongthuc->delete();
        return redirect('admin/phuongthuc/list')->with('thongbao','Bạn đã xóa thành công');
    }

    public function export_csv(){
        //return Excel::download(new Exports , 'category.xlsx');
    }

    public function import_csv(Request $request){
        // $path = $request->file('file')->getRealPath();
        // Excel::import(new Imports, $path);
        // return back();
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoi;

class KhoiController extends Controller
{
    public function getlist(){
        $khoi = Khoi::all();
        return view('admin.khoi.list',['khoi'=>$khoi]);
    }

    public function getadd(){
        return view('admin.khoi.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:khoithi,Ten|max:100'
        ],
        [
            'Ten.unique'=>'Tên khối đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên khối',

            'Ten.max'=>'Tên khối phải không quá 100 kí tự'
        ]);


        $khoi = new Khoi;
        $khoi->tenkhoi = $request->Ten;

        $khoi->save();

        return redirect('admin/khoi/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($makhoi){
        //$hdt = HeDaoTao::find($mahedaotao);
        $khoi = Khoi::where('makhoi',$makhoi)->first();
        return view('admin.khoi.edit',['khoi'=>$khoi]);
    }

    public function postedit(Request $request,$makhoi){
        //$hdt = HeDaoTao::find($mahedaotao);
        $khoi = Khoi::where('makhoi',$makhoi)->first();
        $this->validate($request,
        [
            'Ten'=>'required|unique:khoithi,Ten|max:100'
        ],
        [
            'Ten.unique'=>'Tên khối đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên khối',

            'Ten.max'=>'Tên khối phải không quá 100 kí tự'
        ]);

        $khoi->tenhedaotao = $request->Ten;

        $khoi->save();
        return redirect('admin/khoi/edit/'.$makhoi)->with('thongbao',"Đã sửa khối thi thành công");
    }

    public function postdelete($makhoi){
        $khoi = Khoi::find($makhoi);
        $khoi->delete();
        return redirect('admin/khoi/list')->with('thongbao','Bạn đã xóa thành công');
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

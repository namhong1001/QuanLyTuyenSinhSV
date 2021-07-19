<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonThi;
use App\Models\ToHop;

class MonThiController extends Controller
{
    public function getlist(){
        $monthi = MonThi::all();
        return view('admin.monthi.list',['monthi'=>$monthi]);
    }

    public function getadd(){
        $tohop = ToHop::all();
        return view('admin.monthi.add',['tohop'=>$tohop]);
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|max:100'
        ],
        [
            'Ten.unique'=>'Tên môn thi đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên môn thi',

            'Ten.max'=>'Tên môn thi phải có độ dài không quá 100 kí tự'
        ]);

        $monthi = new MonThi();
        $monthi->mamon = $request->Ma;
        $monthi->tenmon = $request->Ten;
        $monthi->matohop = $request->ToHop;

        $monthi->save();

        return redirect('admin/monthi/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($mamon){
        //$hdt = HeDaoTao::find($mahedaotao);
        $monthi = MonThi::where('mamon',$mamon)->first();
        $tohop = ToHop::all();
        return view('admin.monthi.edit',['monthi'=>$monthi,'tohop'=>$tohop]);
    }

    public function postedit(Request $request,$mamon){
        //$hdt = HeDaoTao::find($mahedaotao);
        $monthi = MonThi::where('mamon',$mamon)->first();
        $this->validate($request,
        [
            'Ten'=>'required|max:100'
        ],
        [
            'Ten.unique'=>'Tên môn thi đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên môn thi',

            'Ten.max'=>'Tên môn thi phải có độ dài không quá 100 kí tự'
        ]);
        $monthi->mamon = $request->Ma;
        $monthi->tenmon = $request->Ten;
        $monthi->matohop = $request->ToHop;

        $monthi->save();
        return redirect('admin/monthi/edit/'.$mamon)->with('thongbao',"Đã sửa môn thi thành công");
    }

    public function postdelete($mamon){
        $monthi = MonThi::find($mamon);
        $monthi->delete();
        return redirect('admin/monthi/list')->with('thongbao','Bạn đã xóa thành công');
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

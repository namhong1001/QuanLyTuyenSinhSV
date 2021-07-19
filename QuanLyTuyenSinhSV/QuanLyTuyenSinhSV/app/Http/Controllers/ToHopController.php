<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToHop;

class ToHopController extends Controller
{
    public function getlist(){
        $tohop = ToHop::all();
        return view('admin.tohop.list',['tohop'=>$tohop]);
    }

    public function getadd(){
        return view('admin.tohop.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100'
        ],
        [
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $tohop = new ToHop;
        $tohop->tentohop = $request->Ten;

        $tohop->save();

        return redirect('admin/tohop/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($matohop){
        //$hdt = HeDaoTao::find($mahedaotao);
        $tohop = ToHop::where('matohop',$matohop)->first();
        return view('admin.tohop.edit',['tohop'=>$tohop]);
    }

    public function postedit(Request $request,$matohop){
        //$hdt = HeDaoTao::find($mahedaotao);
        $tohop = ToHop::where('matohop',$matohop)->first();
        $this->validate($request,
        [
            'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
        ],
        [
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.min'=>'Tên thể loại phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải từ 3 đến 100 kí tự'
        ]);

        $tohop->tentohop = $request->Ten;

        $tohop->save();
        return redirect('admin/tohop/edit/'.$matohop)->with('thongbao',"Đã sửa thể loại thành công");
    }

    public function postdelete($matohop){
        $tohop = ToHop::find($matohop);
        $tohop->delete();
        return redirect('admin/tohop/list')->with('thongbao','Bạn đã xóa thành công');
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

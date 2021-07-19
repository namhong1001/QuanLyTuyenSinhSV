<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeDaoTao;
use Excel;
use App\Imports\HeDaoTaoImport;
use App\Exports\HeDaoTaoExport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class HeDaoTaoController extends Controller
{
    public function getlist(){
        $hdt = HeDaoTao::all();
        return view('admin.hedaotao.list',['hdt'=>$hdt]);
    }

    public function getadd(){
        return view('admin.hedaotao.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:hedaotao,Ten|min:3|max:100'
        ],
        [
            'Ten.unique'=>'Tên hệ đào tạo đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên hệ đào tạo',
            'Ten.min'=>'Tên hệ đào tạo phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên hệ đào tạo phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $hdt = new HeDaoTao;
        $hdt->tenhedaotao = $request->Ten;

        $hdt->save();

        return redirect('admin/hedaotao/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($mahedaotao){
        //$hdt = HeDaoTao::find($mahedaotao);
        $hdt = HeDaoTao::where('mahedaotao',$mahedaotao)->first();
        return view('admin.hedaotao.edit',['hdt'=>$hdt]);
    }

    public function postedit(Request $request,$mahedaotao){
        //$hdt = HeDaoTao::find($mahedaotao);
        $hdt = HeDaoTao::where('mahedaotao',$mahedaotao)->first();
        $this->validate($request,
        [
            'Ten'=>'required|unique:hedaotao,tenhedaotao|min:3|max:100'
        ],
        [
            'Ten.unique'=>'Tên hệ đào tạo đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên hệ đào tạo',
            'Ten.min'=>'Tên hệ đào tạo phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên hệ đào tạo phải từ 3 đến 100 kí tự'
        ]);

        $hdt->tenhedaotao = $request->Ten;

        $hdt->save();
        return redirect('admin/hedaotao/edit/'.$mahedaotao)->with('thongbao',"Đã sửa hệ đào tạo thành công");
    }

    public function postdelete($mahedaotao){
        $hdt = HeDaoTao::find($mahedaotao);
        $hdt->delete();
        return redirect('admin/hedaotao/list')->with('thongbao','Bạn đã xóa thành công');
    }

    public function importForm(Request $request){
        Excel::import(new HeDaoTaoImport, $request->file);
        return redirect('admin/hedaotao/list')->with('thongbao','Bạn đã thêm file excel thành công');
    }

    public function exportIntoExcel(){
        return Excel::download(new HeDaoTaoExport,'hedaotao.xlsx');
    }
}

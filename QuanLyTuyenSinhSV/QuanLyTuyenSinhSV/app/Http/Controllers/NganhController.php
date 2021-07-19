<?php

namespace App\Http\Controllers;

use App\Models\HeDaoTao;
use Illuminate\Http\Request;
use App\Models\Nganh;
use Excel;
use App\Imports\NganhImport;
use App\Exports\NganhExport;

class NganhController extends Controller
{
    public function getlist(){
        $nganh = Nganh::all();
        return view('admin.nganh.list',['nganh'=>$nganh]);
    }

    public function getadd(){
        $hedaotao = HeDaoTao::all();
        return view('admin.nganh.add',['hedaotao'=>$hedaotao]);
    }

    public function postadd(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:nganh,tennganh|min:3|max:100',
            'Ma'=>'required|unique:nganh,manganh'
        ],
        [
            'Ma.unique'=>'Mã ngành đã tồn tại',
            'Ten.unique'=>'Tên ngành đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên ngành',
            'Ten.min'=>'Tên ngành phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên ngành phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $nganh = new Nganh;
        $nganh->manganh = $request->Ma;
        $nganh->tennganh = $request->Ten;
        $nganh->mahedaotao = $request->HeDaoTao;

        $nganh->save();

        return redirect('admin/nganh/add')->with('thongbao','Thêm thành công');
    }

    public function getedit($manganh){
        //$hdt = HeDaoTao::find($mahedaotao);
        $nganh = Nganh::where('manganh',$manganh)->first();
        $hedaotao = HeDaoTao::all();
        return view('admin.nganh.edit',['nganh'=>$nganh,'hedaotao'=>$hedaotao]);
    }

    public function postedit(Request $request,$manganh){
        //$hdt = HeDaoTao::find($mahedaotao);
        $nganh = Nganh::where('manganh',$manganh)->first();
        $this->validate($request,
        [
            'Ten'=>'required|unique:nganh,tennganh|min:3|max:100',
            'Ma'=>'required|unique:nganh,manganh'
        ],
        [
            'Ma.unique'=>'Mã ngành đã tồn tại',
            'Ten.unique'=>'Tên ngành đã tồn tại',
            'Ten.required'=>'Bạn chưa nhập tên ngành',
            'Ten.min'=>'Tên ngành phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên ngành phải có độ dài từ 3 đến 100 kí tự'
        ]);
        $nganh->manganh = $request->Ma;
        $nganh->tennganh = $request->Ten;
        $nganh->mahedaotao = $request->HeDaoTao;

        $nganh->save();
        return redirect('admin/nganh/edit/'.$manganh)->with('thongbao',"Đã sửa ngành thành công");
    }

    public function postdelete($manganh){
        $nganh = Nganh::where('manganh',$manganh)->first();

        $nganh->delete();


        return redirect('admin/nganh/list')->with('thongbao','Bạn đã xóa thành công');
    }

    public function importForm(Request $request){
        Excel::import(new NganhImport, $request->file);
        return redirect('admin/nganh/list')->with('thongbao','Bạn đã thêm file excel thành công');
    }

    public function exportIntoExcel(){
        return Excel::download(new NganhExport,'nganh.xlsx');
    }
}

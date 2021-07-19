<?php

namespace App\Http\Controllers;

use App\Exports\ChiTietNguyenVongExport;
use App\Exports\ChiTietNguyenVongTheoNganhExport;
use App\Exports\ChiTieuExport;
use App\Exports\DiemChuanExport;
use App\Exports\ListTrungTuyenTheoNganhExport;
use App\Exports\ListTrungTuyenTheoPTExport;
use Illuminate\Http\Request;
use Excel;

class ExportController extends Controller
{
    public function exportchitieu(){
        return Excel::download(new ChiTieuExport,'chitieu.xlsx');
    }

    public function exportdiemchuan(){
        return Excel::download(new DiemChuanExport,'diemchuan.xlsx');
    }

    public function exportctnv(Request $request){
        $pt = $request->phuongthuc;
        return Excel::download(new ChiTietNguyenVongExport($pt),'chitietnguyenvongpt.xlsx');
    }

    public function exportctnvtheonganh(Request $request){
        $n = $request->nganh;
        return Excel::download(new ChiTietNguyenVongTheoNganhExport($n),'chitietnguyenvongnganh.xlsx');
    }

    public function exporttttheopt(Request $request){
        $pt = $request->phuongthuc;
        return Excel::download(new ListTrungTuyenTheoPTExport($pt),'listtrungtuyenpt.xlsx');
    }

    public function exporttttheonganh(Request $request){
        $n = $request->nganh;
        return Excel::download(new ListTrungTuyenTheoNganhExport($n),'listtrungtuyennganh.xlsx');
    }
}

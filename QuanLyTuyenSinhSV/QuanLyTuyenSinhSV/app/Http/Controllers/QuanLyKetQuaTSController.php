<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDiem;
use Illuminate\Http\Request;
use App\Models\ChiTieu;
use App\Models\KetQuaTuyenSinh;
use App\Models\PhuongThuc;
use App\Models\Nganh;
use App\Models\PhanTramChiTieu;

class QuanLyKetQuaTSController extends Controller
{
    public function getlist(){
        $ct = ChiTieu::all();
        // foreach($ct as $item){
        //     dd($item->nganh->tennganh);
        // }
        return view('qlts.quanlyketquats.list',['ct'=>$ct]);
    }

    public function getaddchitieu(){
        $nganh = Nganh::all();

        return view('qlts.quanlyketquats.addchitieu',['nganh'=>$nganh]);
    }

    public function postaddchitieu(Request $request){
        $this->validate($request,
        [

        ],
        [

        ]);

        $chitieu = new ChiTieu;
        $chitieu->namhoc = $request->namhoc;
        $chitieu->manganh = $request->nganh;
        $chitieu->soluong = $request->chitieu;
        $chitieu->diemsan = $request->diemsan;

        $chitieu->save();

        return redirect('qlts/quanlyketquats/addchitieu')->with('thongbao','Thêm thành công');
    }

    public function geteditchitieu($machitieu){
        $chitieu = ChiTieu::find($machitieu);
        return view('qlts.quanlyketquats.editchitieu',['chitieu'=>$chitieu]);
    }

    public function posteditchitieu(Request $request, $machitieu){
        $this->validate($request,
        [

        ],
        [

        ]);

        $chitieu = ChiTieu::find($machitieu);
        $chitieu->namhoc = $request->namhoc;
        $chitieu->manganh = $request->nganh;
        $chitieu->soluong = $request->chitieu;
        $chitieu->diemsan = $request->diemsan;

        $chitieu->save();

        return redirect('qlts/quanlyketquats/list')->with('thongbao','Bạn đã cập nhật chỉ tiêu thành công');
    }

    public function getdeletechitieu($machitieu){
        $chitieu = ChiTieu::find($machitieu);
        $chitieu->delete();
        return redirect('qlts/quanlyketquats/list')->with('thongbao','Bạn đã xóa chỉ tiêu thành công');
    }

    public function getchitietnguyenvong(){
        $ct = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->get();

        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();

        return view('qlts.quanlyketquats.chitietnguyenvong',['ct'=>$ct, 'phuongthuc'=>$phuongthuc, 'nganh'=>$nganh]);

    }

    public function timkiemctnv(Request $request){
        $q=KetQuaTuyenSinh::query();
        $mahoso=$request->mahoso;
        $hoten=$request->hoten;
        $manguyenvong = $request->manguyenvong;
        $maphuongthuc = $request->maphuongthuc;
        $manganh = $request->manganh;

        if(isset($mahoso)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('mahoso',$mahoso);
        }

        if(isset($hoten)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('hoten',$hoten);
        }

        if(isset($manguyenvong)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('manguyenvong',$manguyenvong);
        }

        if(isset($maphuongthuc)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('maphuongthuc',$maphuongthuc);
        }

        if(isset($manganh)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('manganh',$manganh);
        }

        if(isset($maphuongthuc) && isset($manganh)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh);
        }

        if(isset($maphuongthuc) && isset($manganh) && isset($manguyenvong)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                    ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                    ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                    ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                    ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                    ->get();
            $ct = $query->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh)->where('manguyenvong',$manguyenvong);
        }

        // if(isset($sapxep)){
        //     if($sapxep == "increase"){
        //         $q->orderBy('tongdiem','asc')->join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //             ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //             ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //             ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        //             ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi');

        //     }
        //     if($sapxep == "decrease"){
        //         $q->orderBy('ketquatuyensinh.tongdiem','desc')->join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //             ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //             ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //             ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        //             ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi');
        //     }
        // }

        //$ct=$q->get();

        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();
        return view('qlts.quanlyketquats.chitietnguyenvong',['ct'=>$ct, 'phuongthuc'=>$phuongthuc, 'nganh'=>$nganh]);
    }

    public function getlisttrungtuyen(){

        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();

        $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

        $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();


        return view('qlts.quanlyketquats.listtrungtuyen',['kq'=>$kq, 'tuyenthang'=>$tuyenthang, 'phuongthuc'=>$phuongthuc, 'nganh'=>$nganh]);
    }

    public function timkiemcttt(Request $request){
        $phuongthuc = PhuongThuc::all();
        $nganh = Nganh::all();

        $manguyenvong = $request->manguyenvong;
        $maphuongthuc = $request->maphuongthuc;
        $manganh = $request->manganh;

        if(isset($manguyenvong)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

            $query1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();
            $tuyenthang = $query->where('manguyenvong',$manguyenvong);
            $kq = $query1->where('manguyenvong',$manguyenvong);
        }

        if(isset($maphuongthuc)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

            $query1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();
            $tuyenthang = $query->where('maphuongthuc',$maphuongthuc);
            $kq = $query1->where('maphuongthuc',$maphuongthuc);
        }

        if(isset($manganh)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

            $query1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();
            $tuyenthang = $query->where('manganh',$manganh);
            $kq = $query1->where('manganh',$manganh);
        }

        if(isset($maphuongthuc) && isset($manganh)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

            $query1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();

            $tuyenthang = $query->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh);
            $kq = $query1->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh);
        }

        if(isset($maphuongthuc) && isset($manganh) && isset($manguyenvong)){
            $query = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->get();

            $query1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->get();
            $tuyenthang = $query->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh)->where('manguyenvong',$manguyenvong);
            $kq = $query1->where('maphuongthuc',$maphuongthuc)->where('manganh',$manganh)->where('manguyenvong',$manguyenvong);
        }

        return view('qlts.quanlyketquats.listtrungtuyen',['kq'=>$kq, 'tuyenthang'=>$tuyenthang, 'phuongthuc'=>$phuongthuc, 'nganh'=>$nganh]);

    }
}

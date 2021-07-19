<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDiem;
use App\Models\HoSo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Nganh;
use App\Models\TrangThaiHoSo;
use App\Models\HoSo_PhuongThuc;
use App\Models\ChonToHop;
use App\Models\KetQuaTuyenSinh;
use App\Models\NguoiDuyet;
use App\Models\NhatKyDuyet;

class HoSoController extends Controller{
    private $arr="";
    public function getlist(){
        $nganh = Nganh::all();
        $trangthai = TrangThaiHoSo::all();
        $hoso = HoSo::all();
        return view('qlts.xulyhoso.listhoso',['nganh'=>$nganh, 'trangthai'=>$trangthai, 'hoso'=>$hoso]);
    }

    public function timkiem(Request $request){
        $q=HoSo::query();
        $dot=$request->dotxettuyen;
        $status=$request->matrangthai;
        $mahoso = $request->mahoso;
        $hoten = $request->hoten;
        $email = $request->email;
        $dienthoai = $request->dienthoai;
        $socmnd = $request->socmnd;

       $q->when($dot,function($query) use ($dot){
            $query->where('dotxettuyen',$dot);
       });
       $q->when($status,function($query) use ($status){
            $query->where('matrangthai',$status);
        });
        $q->when($mahoso,function($query) use ($mahoso){
            $query->where('mahoso',$mahoso);
        });
        $q->when($hoten,function($query) use ($hoten){
            $query->where('hoten','LIKE','%'.$hoten.'%');
        });
        $q->when($email,function($query) use ($email){
            $query->where('email',$email);
        });
        $q->when($dienthoai,function($query) use ($dienthoai){
            $query->where('dienthoai',$dienthoai);
        });
        $q->when($socmnd,function($query) use ($socmnd){
            $query->where('socmnd',$socmnd);
        });

        $hoso=$q->get();

        $trangthai = TrangThaiHoSo::all();

        return view('qlts.xulyhoso.listhoso',compact('hoso','trangthai'));
    }

    public function getduyet($mahoso){
        $hoso = HoSo::find($mahoso);
        $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();
        $a = [];
        foreach($phuongthuc as $item){
            array_push($a,$item->maphuongthuc);
        }

        if(isset($a[0])){
            $pt1 = $a[0];
        }
        if(isset($a[1])){
            $pt2 = $a[1];
        }
        if(isset($a[2])){
            $pt3 = $a[2];
        }
        if(isset($a[3])) {
            $pt4 = $a[3];
        }

        if(isset($pt1)){
            $tohop = ChonToHop::where('mahoso',$mahoso)->get();
            $kqts1 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts1 = [];
            $tohop = [];
        }

        if(isset($pt2)){
            $kqts2 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            $diem2 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts2 = [];
            $diem2 = [];
        }

        if(isset($pt3)){
            $kqts3 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts3 = [];
        }

        if(isset($pt4)){
            $kqts4 = KetQuaTuyenSinh::where('mahspt',$item->mahspt)->get();
            $diem4 = ChiTietDiem::where('mahspt',$item->mahspt)->get();
        } else{
            $kqts4 = [];
            $diem4 = [];
        }
        return view('qlts.xulyhoso.duyet',['hoso'=>$hoso, 'phuongthuc'=>$phuongthuc, 'tohop'=>$tohop, 'kqts1'=>$kqts1, 'kqts2'=>$kqts2, 'kqts3'=>$kqts3, 'kqts4'=>$kqts4, 'diem2'=>$diem2, 'diem4'=>$diem4]);
    }

    public function postduyet(Request $request, $mahoso){
        $hoso = HoSo::find($mahoso);
        if(isset($_POST['hople'])){
            $hoso->where('mahoso',$mahoso)->update(['matrangthai'=>3]);

            $nhatkyduyet = new NhatKyDuyet;
            $iduser = Auth::user()->id;
            $manguoiduyet = NguoiDuyet::where('iduser',$iduser)->get();
            foreach($manguoiduyet as $it){
                $nhatkyduyet->manguoiduyet = $it->manguoiduyet;
                $nhatkyduyet->mahoso = $hoso->mahoso;
                $nhatkyduyet->matrangthai = 3;

                $nhatkyduyet->save();
            }

            return redirect('qlts/xulyhoso/listhoso');
        }

        if(isset($_POST['khonghople'])){
            $hoso->matrangthai = 2;
            $hoso->save();

            $nhatkyduyet = new NhatKyDuyet;
            $iduser = Auth::user()->id;
            $manguoiduyet = NguoiDuyet::where('iduser',$iduser)->get();
            foreach($manguoiduyet as $it){
                $nhatkyduyet->manguoiduyet = $it->manguoiduyet;
                $nhatkyduyet->mahoso = $hoso->mahoso;
                $nhatkyduyet->matrangthai = 2;


                $loisai = [];
                if(isset($_POST['sai'])){
                    foreach($_POST['sai'] as $value){
                        array_push($loisai,$value);
                    }
                }
                $str = ", ";
                $l = implode($str,$loisai);
                $nhatkyduyet->thongtinloi = $l . " ". $request->loi;

                $nhatkyduyet->save();
            }
            return redirect('qlts/xulyhoso/listhoso');
        }
    }

    public function deletenv($mahspt){
        $kq = KetQuaTuyenSinh::find($mahspt);
        $kqts = KetQuaTuyenSinh::find($mahspt)->get();
        foreach($kqts as $item){
            $m = DB::table('ketquatuyensinh')->select('hoso_phuongthuc.mahoso')
                                    ->where('ketquatuyensinh.mahspt',$item->mahspt)
                                    ->join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                    ->get();
        }

        $ma = json_decode(json_encode($m), True);
        $ma1 = json_decode(json_encode($ma), True);
        $ma2 = array_column($ma1, 'mahoso');
        array_shift($ma2);
        foreach($ma2 as $i){
            $mahoso = $i;
        }

        $kq->delete();
        return redirect('qlts/xulyhoso/duyet/'.$mahoso)->with('thongbao','Bạn đã xóa thành công');
    }

    public function getnhatkyduyet(){
        $nhatky = NhatKyDuyet::all();
        return view('qlts.xulyhoso.nhatkyduyet',['nhatky'=>$nhatky]);
    }
}

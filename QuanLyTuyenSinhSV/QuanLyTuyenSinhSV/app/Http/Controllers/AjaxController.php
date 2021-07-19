<?php

namespace App\Http\Controllers;

use App\Models\ChiTietNganhKhoi;
use App\Models\DiemChuan;
use App\Models\Khoi;
use App\Models\ThongKe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getkhoi(Request $request, $manganh){
        $out='';
        if($request->ajax()){
            $khoi = DB::table('nganhkhoi')->where('manganh',$manganh)->get();
            foreach($khoi as $item){
                $out.= "<option value='".$item->makhoi."'>".$item->tenkhoi."</option>";
            }
        }
        return response($out);
    }

    public function getdata(){
        //vẽ biểu đồ
        $thongke = ThongKe::all();
        $totaldangky = ThongKe::sum('soluongdangky');
        $totaltrungtuyen = ThongKe::sum('soluongtrungtuyen');
        // foreach($thongke as $item){
        //     $data[] = array(
        //         'soluongdangky' => $item->soluongdangky,
        //         'soluongtrungtuyen' => $item->soluongtrungtuyen
        //     );
        // }
        $test = (object)array(
            ['nam' => '2021',
            'soluongdangky' => $totaldangky,
            'soluongtrungtuyen' => $totaltrungtuyen],
            ['nam' => '2020',
            'soluongdangky' => 30,
            'soluongtrungtuyen' => 28],
            ['nam' => '2019',
            'soluongdangky' => 25,
            'soluongtrungtuyen' => 20],
            ['nam' => '2018',
            'soluongdangky' => 38,
            'soluongtrungtuyen' => 35],
            ['nam' => '2017',
            'soluongdangky' => 45,
            'soluongtrungtuyen' => 32],
        );

        foreach($test as $item){
            $data[] = array(
                'nam' => $item['nam'],
                'soluongdangky' => $item['soluongdangky'],
                'soluongtrungtuyen' => $item['soluongtrungtuyen']
            );
        }

        // $data[] = array(
        //     'nam' => '2021',
        //     'soluongdangky' => $totaldangky,
        //     'soluongtrungtuyen' => $totaltrungtuyen
        // );

        return response($data);
    }

    public function getdatanganh(){
        $diemchuan = DiemChuan::all();
        foreach($diemchuan as $item){
                $data[] = array(
                    'nam' => $item->manganh,
                    'diemchuan' => $item->diemchuan,
                    'diemsan' => $item->diemchuan
                );
        }


        return response($data);
    }
}

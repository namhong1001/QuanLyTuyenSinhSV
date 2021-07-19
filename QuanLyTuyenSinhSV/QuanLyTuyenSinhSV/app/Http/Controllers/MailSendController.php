<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use App\Models\HoSo;
use App\Models\KetQuaTuyenSinh;
use App\Models\Mail as ModelsMail;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{
    public function getmail(){
        $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                                            ->where('phuongthucxettuyen.maphuongthuc',3)
                                            ->select('hoso.email','hoso.hoten')->distinct()->get();

        $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                            ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                            ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                            ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                            ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                            ->join('diemchuan', function($join){
                                $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
                                    ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
                                    ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
                            })->select('hoso.email','hoso.hoten')->distinct()->get();


        return view('emails.noidungmail',['tt'=>$tuyenthang, 'kq'=>$kq]);
    }

    public function postmail(Request $request){
        $mail = ModelsMail::find(1);
        $mail->tbtt = $request->tbtt;
        $mail->save();

        return redirect('sendmail');
    }

    public function mailsend(){
        $details = [
            'title' => "Test gửi mail",
            'body'=> 'Test test'
        ];

        // $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                                     ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                                     ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                                     ->where('phuongthucxettuyen.maphuongthuc',3)
        //                                     ->select('hoso.email','hoso.hoten')->distinct()->get();

        // $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                     ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                     ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                     ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        //                     ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
        //                     ->join('diemchuan', function($join){
        //                         $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
        //                             ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
        //                             ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
        //                     })->select('hoso.email','hoso.hoten')->distinct()->get();

        // foreach($tuyenthang as $item){
        //     Mail::to($item->email)->send(new SendMail($details));
        // }

        // foreach($kq as $item){
        //     Mail::to($item->email)->send(new SendMail($details));
        // }


        $mail = ['khanhvandlu1999@gmail.com','phamchicuong080198@gmail.com','1710299@dlu.edu.vn'];
        foreach($mail as $m)
        {
            Mail::to($m)->send(new SendMail($details));
        }

        return redirect('noidungmail')->with('thongbao','Bạn đã gửi thông báo trúng tuyển thành công');
    }
}

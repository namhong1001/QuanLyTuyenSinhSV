<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDiem;
use App\Models\ChiTietNganhKhoi;
use App\Models\ChonToHop;
use Illuminate\Http\Request;
use App\Models\HoSo;
use App\Models\HoSo_PhuongThuc;
use App\Models\Khoi;
use App\Models\MonThi;
use App\Models\KetQuaTuyenSinh;
use App\Models\Nganh;
use App\Models\NganhKhoi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DangKyHoSoController extends Controller
{
    public function gethoso(){
        $nganh = Nganh::all();
        $khoi = Khoi::all();
        $mon = MonThi::all();
        return view('dangkyhoso',['khoi'=>$khoi,'mon'=>$mon,'nganh'=>$nganh]);
    }

    public function posthoso(Request $request){
        // $this->validate($request,
        // [
        //     'name'=>'required|min:3|max:100',
        //     'gt'=>'required',
        //     'ngaysinh'=>'required',
        //     'noisinh'=>'required',
        //     'dantoc'=>'required',
        //     'quoctich'=>'required',
        //     'cmnd'=>'required',
        //     'hokhau'=>'required',
        //     'lop10'=>'required',
        //     'lop11'=>'required',
        //     'lop12'=>'required',
        //     'tenlop12'=>'required',
        //     'dienthoai'=>'required',
        //     'email'=>'required',
        //     'tennguoilienhe'=>'required',
        //     'diachinguoilienhe'=>'required',
        //     'dienthoainguoilienhe'=>'required',
        //     'mahoidongthi'=>'required',
        //     'madonvidkdt'=>'required',
        //     'doituong'=>'required',
        //     'khuvuc'=>'required',
        //     'namtotnghiep'=>'required',

        // ],
        // [
        //     'name.required'=>'Bạn chưa nhập họ tên',
        //     'name.min'=>'Tên hệ đào tạo phải từ 3 đến 100 kí tự',
        //     'name.max'=>'Tên hệ đào tạo phải từ 3 đến 100 kí tự',
        //     'gt.required'=>'Bạn chưa nhập giới tính',
        //     'ngaysinh.required'=>'Bạn chưa chọn giới tính',
        //     'noisinh.required'=>'Bạn chưa nhập nơi sinh',
        //     'dantoc.required'=>'Bạn chưa nhập dân tộc',
        //     'quoctich.required'=>'Bạn chưa nhập quốc tịch',
        //     'cmnd.required'=>'Bạn chưa nhập số CMND/CCCD',
        //     'hokhau.required'=>'Bạn chưa nhập hộ khẩu',
        //     'lop10.required'=>'Bạn chưa nhập địa chỉ trường học lớp 10',
        //     'lop11.required'=>'Bạn chưa nhập địa chỉ trường học lớp 11',
        //     'lop12.required'=>'Bạn chưa nhập địa chỉ trường học lớp 12',
        //     'tenlop12.required'=>'Bạn chưa nhập tên lớp 12',
        //     'dienthoai.required'=>'Bạn chưa nhập số điện thoại',
        //     'email.required'=>'Bạn chưa nhập địa chỉ email',
        //     'tennguoilienhe.required'=>'Bạn chưa nhập họ tên người liên hệ',
        //     'diachinguoilienhe.required'=>'Bạn chưa nhập địa chỉ người liên hệ',
        //     'dienthoainguoilienhe.required'=>'Bạn chưa nhập số điện thoại người liên hệ',
        //     'mahoidongthi.required'=>'Bạn chưa nhập mã hội đồng thi',
        //     'madonvidkdt.required'=>'Bạn chưa nhập mã đơn vị đăng ký dự thi',
        //     'doituong.required'=>'Bạn chưa nhập đối tượng ưu tiên',
        //     'khuvuc.required'=>'Bạn chưa nhập khu vực',
        //     'namtotnghiep.required'=>'Bạn chưa nhập năm tốt nghiệp',

        // ]);



        //Thêm dữ liệu vào bảng hồ sơ
        $hoso = new HoSo;
        $dot = DB::table('attribute')->where('loaiattribute','dotxettuyen')->get();
        foreach($dot as $item){
            $dotts = $item->giatri;
        }
        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi=='png' && $duoi=='jpg' && $duoi='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4).'-'.$name;

            $file->move("upload/hoso/",$hinh);
            //unlink("upload/hoso/".$hoso->hinhanh);
        }

        if($request->hasFile('imgcmndtruoc')){
            $file1 = $request->file('imgcmndtruoc');
            $duoi1 = $file1->getClientOriginalExtension();
            if($duoi1=='png' && $duoi1=='jpg' && $duoi1='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name1 = $file1->getClientOriginalName();
            $imgcmndtruoc = Str::random(4).'-'.$name1;

            $file1->move("upload/hoso/",$imgcmndtruoc);
            //unlink("upload/hoso/".$hoso->hinhanh);
        }

        if($request->hasFile('imgcmndsau')){
            $file2 = $request->file('imgcmndsau');
            $duoi2 = $file2->getClientOriginalExtension();
            if($duoi2=='png' && $duoi2=='jpg' && $duoi2='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name2 = $file2->getClientOriginalName();
            $imgcmndsau = Str::random(4).'-'.$name2;

            $file2->move("upload/hoso/",$imgcmndsau);
            //unlink("upload/hoso/".$hoso->hinhanh);
        }

        if($request->hasFile('imghocba')){
            $file3 = $request->file('imghocba');
            $duoi3 = $file3->getClientOriginalExtension();
            if($duoi3=='png' && $duoi3=='jpg' && $duoi3='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file3->getClientOriginalName();
            $imghocba = Str::random(4).'-'.$name;

            $file3->move("upload/hoso/",$imghocba);
            //unlink("upload/hoso/".$hoso->hinhanh);
        } else {
            $imghocba = '';
        }

        if($request->hasFile('imgtuyenthang')){
            $file4 = $request->file('imgtuyenthang');
            $duoi4 = $file4->getClientOriginalExtension();
            if($duoi4=='png' && $duoi4=='jpg' && $duoi4='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file4->getClientOriginalName();
            $imgtuyenthang = Str::random(4).'-'.$name;

            $file4->move("upload/hoso/",$imgtuyenthang);
            //unlink("upload/hoso/".$hoso->hinhanh);
        } else{
            $imgtuyenthang = '';
        }

        if($request->hasFile('imgnangluc')){
            $file5 = $request->file('imgnangluc');
            $duoi5 = $file5->getClientOriginalExtension();
            if($duoi5=='png' && $duoi5=='jpg' && $duoi5='jpeg'){
                return redirect('dangkyhoso')->with('loi','Bạn chỉ được chọn file hình');
            }
            $name = $file5->getClientOriginalName();
            $imgnangluc = Str::random(4).'-'.$name;

            $file5->move("upload/hoso/",$imgnangluc);
            //unlink("upload/hoso/".$hoso->hinhanh);
        } else {
            $imgnangluc = '';
        }

        $mahoso = DB::table('hoso')->insertGetId([
            'hoten'=>$request->input('name'),
            'hinhanh'=>$hinh,
            'imgcmndtruoc'=>$imgcmndtruoc,
            'imgcmndsau'=>$imgcmndsau,
            'imghocba'=>$imghocba,
            'imgtuyenthang'=>$imgtuyenthang,
            'imgnangluc'=>$imgnangluc,
            'gioitinh' => $request->input('gt'),
            'ngaysinh' => $request->input('ngaysinh'),
            'noisinh' => $request->input('noisinh'),
            'dantoc' => $request->input('dantoc'),
            'quoctich' => $request->input('quoctich'),
            'hokhauthuongtru' => $request->input('hokhau'),
            'socmnd' => $request->input('cmnd'),
            'dienthoai' => $request->input('dienthoai'),
            'email' => $request->input('email'),
            'lop10' => $request->input('lop10'),
            'lop11' => $request->input('lop11'),
            'lop12' => $request->input('lop12'),
            'tenlop12' => $request->input('tenlop12'),
            'hotennguoilienhe' => $request->input('tennguoilienhe'),
            'diachinguoilienhe' => $request->input('diachinguoilienhe'),
            'dienthoainguoilienhe' => $request->input('dienthoainguoilienhe'),
            'mahoidongthi' => $request->input('mahoidongthi'),
            'madonvidkxt' => $request->input('madonvidkxt'),
            'doituong' => $request->input('doituong'),
            'makhuvuc' => $request->input('khuvuc'),
            'namtotnghiep' => $request->input('namtotnghiep'),
            'dotxettuyen' => $dotts,
            'namdoatgiai' => $request->input('namdoatgiai'),
            'mondoatgiai' => $request->input('mondoatgiai'),
            'loaigiaihuychuong' => $request->input('loaigiaihuychuong'),
            'olympicmon' => $request->input('olypicmon'),
            'matrangthai'=> 1,
            'iduser'=>Auth::user()->id
        ]);


        //Thêm dữ liệu vào bảng chọn tổ hợp thi
        if(isset($_POST['tohop'])){
            foreach($_POST['tohop'] as $value){
                $cth = new ChonToHop;
                $cth->mahoso = $mahoso;
                $cth->matohop = $value;
                //dd($value);
                $cth->save();
            }
        } else{

        }

        //Thêm dữ liệu vào bảng chọn phương thức thi và chi tiết kết quả tuyển sinh
        if(isset($_POST['phuongthuc'])){
            foreach($_POST['phuongthuc'] as $value){

                //Thêm dữ liệu vào bảng chọn phương thức thi
                $mahspt = DB::table('hoso_phuongthuc')->insertGetId([
                        'mahoso' => $mahoso,
                        'maphuongthuc' => $value
                    ]);



                //Thêm dữ liệu vào bảng kết quả tuyển sinh và bảng chi tiết điểm

                //TH thi THPT
                if($value == 1){

                    foreach($request->manguyenvong1 as $key=>$manguyenvong1){
                        $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh1[$key]],['makhoi',$request->makhoi1[$key]]])->first();
                        if($nganhkhoi===null){
                            echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                        } else{
                            $kqts = new KetQuaTuyenSinh;
                            $kqts->mahspt = $mahspt;
                            $kqts->manguyenvong = $manguyenvong1;
                            $kqts->manganh = $request->manganh1[$key];
                            $kqts->makhoi = $request->makhoi1[$key];
                            $kqts->save();
                        }

                    }

                    $chitietchontohop = DB::table('chitietchontohop')->select('matohop')->where('mahoso',$mahoso)->get();
                    foreach($chitietchontohop as $item){
                        $mon = DB::table('monthi')->where('matohop',$item->matohop)->get();
                        foreach($mon as $m){
                            $ctd = new ChiTietDiem;
                            $ctd->mahspt = $mahspt;
                            $ctd->mamon = $m->mamon;
                            $ctd->diem = 0;
                            $ctd->save();
                        }
                     }
                }

                //TH học bạ

                if($value == 2){

                    foreach($request->manguyenvong2 as $key=>$manguyenvong2){
                        $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh2[$key]],['makhoi',$request->makhoi2[$key]]])->first();
                        if($nganhkhoi===null){
                            echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                        } else{
                            $kqts = new KetQuaTuyenSinh;
                            $kqts->mahspt = $mahspt;
                            $kqts->manguyenvong = $manguyenvong2;
                            $kqts->manganh = $request->manganh2[$key];
                            $kqts->makhoi = $request->makhoi2[$key];
                            $kqts->save();
                        }
                    }

                    foreach($request->mamon as $key => $mamon){
                        $ctd = new ChiTietDiem;
                        $ctd->mahspt = $mahspt;
                        $ctd->mamon = $mamon;
                        $ctd->diem = $request->diem[$key];
                        $ctd->save();
                    }

                    $hoso = HoSo::find($mahoso);
                    $phuongthuc = HoSo_PhuongThuc::where('mahoso',$mahoso)->get();

                    foreach($phuongthuc as $hspt){
                        $kqts = DB::table('ketquatuyensinh')->where('mahspt',$hspt->mahspt)->get();
                        foreach($kqts as $ts){
                            $khoimon = DB::table('chitietchonkhoimon')->where('makhoi',$ts->makhoi)->get();
                            foreach($khoimon as $km){
                                $chitietdiem = DB::table('chitietdiem')->where([['mahspt',$hspt->mahspt],['mamon',$km->mamon],])->get();

                                foreach($chitietdiem as $ctd){
                                     echo $ctd->mahspt ." - ".$km->makhoi." - ".$ctd->mamon." - ".$ctd->diem."<br>";
                                    $diem = DB::table('chitietdiem')
                                            ->selectRaw('sum(diem) as tongdiem, chitietchonkhoimon.makhoi')
                                            ->where('chitietdiem.mahspt',$hspt->mahspt)
                                            ->join('chitietchonkhoimon','chitietdiem.mamon','=','chitietchonkhoimon.mamon')
                                            ->groupBy('makhoi')
                                            ->having('chitietchonkhoimon.makhoi','=',$km->makhoi)
                                            ->get();
                                }
                            }
                            $array = json_decode(json_encode($diem), True);
                            foreach($array as $k => $v){
                                echo $v['tongdiem']."<br>";
                                DB::table('ketquatuyensinh')->where([['mahspt',$hspt->mahspt],['makhoi',$km->makhoi],])->update(['tongdiem'=>$v['tongdiem']]);
                            }

                        }
                    }

                }

                //TH tuyển thẳng

                if($value == 3){

                    foreach($request->manguyenvong3 as $key=>$manguyenvong3){
                        $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh3[$key]],['makhoi',$request->makhoi3[$key]]])->first();
                        if($nganhkhoi===null){
                            echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                        } else{
                            $kqts = new KetQuaTuyenSinh;
                            $kqts->mahspt = $mahspt;
                            $kqts->manguyenvong = $manguyenvong3;
                            $kqts->manganh = $request->manganh3[$key];
                            $kqts->makhoi = $request->makhoi3[$key];
                            $kqts->save();
                        }
                    }

                }

                //TH thi năng lực

                if($value == 4){

                    foreach($request->manguyenvong4 as $key=>$manguyenvong4){
                        $nganhkhoi = DB::table('nganhkhoi')->where([['manganh',$request->manganh4[$key]],['makhoi',$request->makhoi4[$key]]])->first();
                        if($nganhkhoi===null){
                            echo "Ngành khối bạn đăng ký nguyện vọng không đúng với quy định của trường";
                        } else{
                            $kqts = new KetQuaTuyenSinh;
                            $kqts->mahspt = $mahspt;
                            $kqts->manguyenvong = $manguyenvong4;
                            $kqts->manganh = $request->manganh4[$key];
                            $kqts->makhoi = $request->makhoi4[$key];
                            $kqts->save();
                        }
                    }

                    $ctd = new ChiTietDiem;
                    $ctd->mahspt = $mahspt;
                    $ctd->mamon = "12";
                    $ctd->diem = $request->diemnangluc;
                    $ctd->save();

                }


            }
        }


        return redirect('chitiethoso/'.$mahoso);


    }
}

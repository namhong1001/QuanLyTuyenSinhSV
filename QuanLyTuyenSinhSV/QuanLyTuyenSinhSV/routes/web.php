<?php

use App\Models\KetQuaTuyenSinh;
use App\Models\PhanTramChiTieu;
use App\Models\ChiTieu;
use App\Models\DiemChuan;
use App\Models\Nganh;
use App\Models\Test;
use App\Models\ThongKe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test',function(){
    // $b = DB::table('chitietchontohop')->select('matohop')->where('mahoso',2)->get();
    // foreach($b as $item){
    //    $a = DB::table('monthi')->where('matohop',$item->matohop)->get();
    //    dd($a);
    // }

    // $a = DB::table('hoso_phuongthuc')->where('mahoso',18)->get();
    // foreach($a as $item){
    //     dd($item);
    // }
    // $iduser = Auth::user()->id;
    // $manguoiduyet = DB::table('nguoiduyet')->where('iduser',$iduser)->select('manguoiduyet')->get();
    //     echo $manguoiduyet;


        // $tohop = DB::table('chitietchontohop')->where('mahoso',17)->get();

        // $m = [];
        //  foreach($tohop as $item){

        //      $mon = DB::table('monthi')->where('matohop',$item->matohop)->get();
        //     foreach($mon as $items){

        //         array_push($m,$items->tenmon);
        //     }


        //  }

        // dd($m);

        // $diem = [6,7,8,9,10,4];
        // $mamon = [1,2,3,4,5,6];
        // print_r(array_combine($mamon,$diem));

        // $hoso = DB::table('hoso')->where('mahoso',17);
        // $hosophuongthuc = DB::table('hoso_phuongthuc')->where('mahoso',18)->get();
        // foreach($hosophuongthuc as $hspt){
        //     $kqts = DB::table('ketquatuyensinh')->where('mahspt',$hspt->mahspt)->get();
        //     foreach($kqts as $ts){
        //         $khoimon = DB::table('chitietchonkhoimon')->where('makhoi',$ts->makhoi)->get();
        //         foreach($khoimon as $km){
        //             $chitietdiem = DB::table('chitietdiem')->where([['mahspt',$hspt->mahspt],['mamon',$km->mamon],])->get();

        //             foreach($chitietdiem as $ctd){
        //                  echo $ctd->mahspt ." - ".$km->makhoi." - ".$ctd->mamon." - ".$ctd->diem."<br>";
        //                 $diem = DB::table('chitietdiem')
        //                         ->selectRaw('sum(diem) as tongdiem, chitietchonkhoimon.makhoi')
        //                         ->where('chitietdiem.mahspt',$hspt->mahspt)
        //                         ->join('chitietchonkhoimon','chitietdiem.mamon','=','chitietchonkhoimon.mamon')
        //                         ->groupBy('makhoi')
        //                         ->having('chitietchonkhoimon.makhoi','=',$km->makhoi)
        //                         ->get();
        //             }
        //         }
        //         $array = json_decode(json_encode($diem), True);
        //         foreach($array as $k => $v){
        //             echo $v['tongdiem']."<br>";
        //             DB::table('ketquatuyensinh')->where([['mahspt',$hspt->mahspt],['makhoi',$km->makhoi],])->update(['tongdiem'=>$v['tongdiem']]);
        //         }

        //     }
        // }

        // $a = ["0"=>"a", "1"=>"b", "2"=>"c"];
        // $t = " ";
        // $b = implode($t,$a);
        // echo $b;

        // $arr = DB::table('ketquatuyensinh')->join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //         ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //         ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //         ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        //         ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
        //         ->get();
        // $que = $arr->where('mahoso',22);
        // dd($que);


        // $iduser = Auth::user()->id;
        //             $hoso = DB::table('hoso')->where('iduser',$iduser)->get();
        //             dd($hoso);
        //             foreach ($hoso as $item) {
        //                 $mahoso = $item->mahoso;
        //             }



        // $nganh = Nganh::all();
        // $arrpt = [1,4,2];
        // foreach($nganh as $ng){
        //     foreach($arrpt as $pt){
        //         //lấy điểm sàn
        //         $diemsan = ChiTieu::where('manganh',7140210)->first();

        //         //lấy phần trăm của phương thức đó
        //         $phantram = PhanTramChiTieu::where('maphuongthuc',1)->first();
        //         $phantramchitieu = $phantram->phantramchitieu;

        //         //lấy chỉ tiêu
        //         $ct = ChiTieu::where('manganh',$ng->manganh)->first();
        //         $chitieu1 = $ct->soluong;

        //         //nếu ngành đó có người đăng ký tuyển thẳng
        //         $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                                     ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                                     ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                                     ->where('phuongthucxettuyen.maphuongthuc',3)->where('manganh',7140210)
        //                                     ->exists();

        //         if($tuyenthang == true){
        //             $soluongtuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                                                 ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                                                 ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                                                 ->where('phuongthucxettuyen.maphuongthuc',3)->where('manganh',7140210)
        //                                                 ->count();
        //             $chitieu = $chitieu1 - $soluongtuyenthang;
        //         }else {
        //             $chitieu = $chitieu1;
        //         }

        //         //tính số lượng thí sinh theo phương thức và phần trăm chỉ tiêu
        //         $sl = ceil($chitieu * $phantramchitieu / 100);

        //         //sắp xếp giảm dần
        //         $dc = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                             ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                             ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                             ->where('manganh',7140210)->where('phuongthucxettuyen.maphuongthuc',1)
        //                             ->orderBy('tongdiem','desc')->orderBy('ketquatuyensinh.manguyenvong','asc')->limit($sl)->get();

        //                             $dc1 = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                             ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                             ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                             ->where('manganh',7140210)->where('phuongthucxettuyen.maphuongthuc',1)
        //                             ->orderBy('tongdiem','desc')->orderBy('ketquatuyensinh.manguyenvong','asc')->limit($sl)->exists();
        //         if($dc1 == false){
        //             $diem = $diemsan->diemsan;
        //         } else{
        //             foreach($dc as $item){
        //                 $diem = $item->tongdiem;
        //             }

        //             if($diem < $diemsan->diemsan){
        //                 $diem = $diemsan->diemsan;
        //             }
        //         }
        //         dd($diem);

        //         DiemChuan::where([['manganh',$ng->manganh], ['maphuongthuc',$pt]])->update(['diemchuan'=>$diem]);
        //     }
        // }

        // $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                 ->join('diemchuan', function($join){
        //                     $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
        //                          ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
        //                          ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem')
        //                          ->orWhereColumn('diemchuan.diemchuan','=','ketquatuyensinh.tongdiem');
        //                 })->get();

        // foreach($kq as $item){
        //     echo $item->mahspt . "<br>";
        // }

        // echo $kq->count();

        // $kqts = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        //                                 ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        //                                 ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        //                                 ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        //                                 ->where('ketquatuyensinh.manganh','7340101')
        //                                 ->where('phuongthucxettuyen.maphuongthuc',1)
        //                                 ->count();
        // dd($kqts);

        // $thongke = ThongKe::all();
        // foreach($thongke as $item){
        //     if($item->maphuongthuc == 1){
        //         $data[] = array(
        //             'nganh' => $item->manganh,
        //             'soluongdangky' => $item->soluongdangky,
        //             'soluongtrungtuyen' => $item->soluongtrungtuyen
        //         );
        //     }
        // }

        // dd($data);

        // $tuyenthang = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        // ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        // ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        // ->where('phuongthucxettuyen.maphuongthuc',3)
        // ->select('hoso.email')->distinct()->get();
        // foreach($tuyenthang as $item){
        //     echo $item->email;
        // }

        // $kq = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        // ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        // ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        // ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        // ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
        // ->join('diemchuan', function($join){
        // $join->on('hoso_phuongthuc.maphuongthuc','=','diemchuan.maphuongthuc')
        // ->on('diemchuan.manganh','=','ketquatuyensinh.manganh')
        // ->whereColumn('diemchuan.diemchuan','<','ketquatuyensinh.tongdiem');
        // })->get();

        $kqts = KetQuaTuyenSinh::join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
        ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
        ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
        ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
        ->where('phuongthucxettuyen.maphuongthuc',2)
        ->where('ketquatuyensinh.manganh','7140202')
        ->count();
        dd($kqts);
});

Route::get('/','App\Http\Controllers\HomeSVController@index');
Route::get('noidungmail','App\Http\Controllers\MailSendController@getmail');
Route::post('noidungmail','App\Http\Controllers\MailSendController@postmail');
Route::get('sendmail','App\Http\Controllers\MailSendController@mailsend');

//export excel
Route::post('exportchitieu','App\Http\Controllers\ExportController@exportchitieu')->name('exportchitieu');
Route::post('exportdiemchuan','App\Http\Controllers\ExportController@exportdiemchuan')->name('exportdiemchuan');
Route::post('exportctnv','App\Http\Controllers\ExportController@exportctnv')->name('exportctnv');
Route::post('exportctnvtheonganh','App\Http\Controllers\ExportController@exportctnvtheonganh')->name('exportctnvtheonganh');
Route::post('exporttttheopt','App\Http\Controllers\ExportController@exporttttheopt')->name('exporttttheopt');
Route::post('exporttttheonganh','App\Http\Controllers\ExportController@exporttttheonganh')->name('exporttttheonganh');

// Đăng nhập, đăng ký, đăng xuất
Route::get('login','App\Http\Controllers\UserController@getLogin');
Route::post('login','App\Http\Controllers\UserController@postLogin');

Route::get('signin','App\Http\Controllers\UserController@getSignin');
Route::post('signin','App\Http\Controllers\UserController@postSignin');

Route::get('logout','App\Http\Controllers\UserController@logout');

//Sinh viên
Route::get('home','App\Http\Controllers\HomeSVController@index');
Route::get('lienhe','App\Http\Controllers\HomeSVController@lienhe');
Route::get('dangkyhoso','App\Http\Controllers\DangKyHoSoController@gethoso')->middleware('thisinhLogin');
Route::post('dangkyhoso','App\Http\Controllers\DangKyHoSoController@posthoso');
Route::get('chinhsuahoso/{mahoso}','App\Http\Controllers\ChinhSuaHoSoController@getchinhsuahoso')->middleware('thisinhLogin');
Route::post('chinhsuahoso/{mahoso}','App\Http\Controllers\ChinhSuaHoSoController@postchinhsuahoso');
Route::get('chinhsuanguyenvong/{mahoso}','App\Http\Controllers\ChinhSuaNguyenVongController@getchinhsuanguyenvong')->middleware('thisinhLogin');
Route::post('chinhsuanguyenvong/{mahoso}','App\Http\Controllers\ChinhSuaNguyenVongController@postchinhsuanguyenvong');
Route::get('error','App\Http\Controllers\ChinhSuaHoSoController@error');
Route::get('chitiethoso/{mahoso}','App\Http\Controllers\ChiTietHoSoController@getchitiet');

Route::prefix('ajax')->group(function () {
    Route::get('nganhkhoi/{manganh}','App\Http\Controllers\AjaxController@getkhoi');
    Route::get('thongketheonam','App\Http\Controllers\AjaxController@getdata');
    Route::get('thongketheonganh','App\Http\Controllers\AjaxController@getdatanganh');
});




//Quản lý tuyển sinh
Route::prefix('qlts')->middleware('qltsLogin')->group(function () {
    Route::prefix('xulyhoso')->group(function () {
        Route::get('listhoso','App\Http\Controllers\HoSoController@getlist');
        Route::get('listhosos','App\Http\Controllers\HoSoController@timkiem');
        Route::get('timkiemhoso','App\Http\Controllers\HoSoController@timkiem');
        Route::get('duyet/{mahoso}','App\Http\Controllers\HoSoController@getduyet');
        Route::post('duyet/{mahoso}','App\Http\Controllers\HoSoController@postduyet');
        Route::get('deletenv/{mahspt}','App\Http\Controllers\HoSoController@deletenv');
        Route::get('nhatkyduyet','App\Http\Controllers\HoSoController@getnhatkyduyet');
    });

    Route::prefix('quanlydiem')->group(function () {
        Route::get('nhapdiem/{mahoso}','App\Http\Controllers\QuanLyDiemController@getnhapdiem');
        Route::post('nhapdiem/{mahoso}','App\Http\Controllers\QuanLyDiemController@postnhapdiem');
    });

    Route::prefix('quanlyketquats')->group(function () {
        Route::get('list','App\Http\Controllers\QuanLyKetQuaTSController@getlist');
        Route::get('chitietnguyenvong','App\Http\Controllers\QuanLyKetQuaTSController@getchitietnguyenvong');
        Route::get('timkiemctnv','App\Http\Controllers\QuanLyKetQuaTSController@timkiemctnv');
        Route::get('addchitieu','App\Http\Controllers\QuanLyKetQuaTSController@getaddchitieu');
        Route::post('addchitieu','App\Http\Controllers\QuanLyKetQuaTSController@postaddchitieu');
        Route::get('editchitieu/{machitieu}','App\Http\Controllers\QuanLyKetQuaTSController@geteditchitieu');
        Route::post('editchitieu/{machitieu}','App\Http\Controllers\QuanLyKetQuaTSController@posteditchitieu');
        Route::get('deletechitieu/{machitieu}','App\Http\Controllers\QuanLyKetQuaTSController@getdeletechitieu');
        Route::get('listtrungtuyen','App\Http\Controllers\QuanLyKetQuaTSController@getlisttrungtuyen');
        Route::get('timkiemcttt','App\Http\Controllers\QuanLyKetQuaTSController@timkiemcttt');
    });

    Route::prefix('quanlythoigian')->group(function () {
        Route::get('thoigian','App\Http\Controllers\QuanLyThoiGianController@getthoigian');
        Route::post('thoigian','App\Http\Controllers\QuanLyThoiGianController@postthoigian');
    });

    Route::prefix('quanlydiemchuan')->group(function () {
        Route::get('listphantramchitieu','App\Http\Controllers\PhanTramChiTieuController@getlistphantramchitieu');
        Route::get('editphantramchitieu/{id}','App\Http\Controllers\PhanTramChiTieuController@geteditphantramchitieu');
        Route::post('editphantramchitieu/{id}','App\Http\Controllers\PhanTramChiTieuController@posteditphantramchitieu');
        Route::get('listdiemchuan','App\Http\Controllers\DiemChuanController@getlistdiemchuan');
        Route::get('adddiemchuan','App\Http\Controllers\DiemChuanController@getadddiemchuan');
        Route::post('adddiemchuan','App\Http\Controllers\DiemChuanController@postadddiemchuan');
    });

    Route::prefix('thongke')->group(function () {
        Route::get('thongke','App\Http\Controllers\ThongKeController@getlist');
    });
});

//Admin
Route::prefix('admin')->middleware('adminLogin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('list','App\Http\Controllers\UserController@getlist');
        Route::get('add','App\Http\Controllers\UserController@getadd');
        Route::post('add','App\Http\Controllers\UserController@postadd');
        Route::get('edit/{id}','App\Http\Controllers\UserController@getedit');
        Route::post('edit/{id}','App\Http\Controllers\UserController@postedit');
        Route::get('delete/{id}','App\Http\Controllers\UserController@getdelete');
    });

    Route::prefix('loaitin')->group(function () {
        Route::get('list','App\Http\Controllers\LoaiTinController@getlist');
        Route::get('add','App\Http\Controllers\LoaiTinController@getadd');
        Route::post('add','App\Http\Controllers\LoaiTinController@postadd');
        Route::get('edit/{id}','App\Http\Controllers\LoaiTinController@getedit');
        Route::post('edit/{id}','App\Http\Controllers\LoaiTinController@postedit');
        Route::get('delete/{id}','App\Http\Controllers\LoaiTinController@getdelete');
    });

    Route::prefix('tintuc')->group(function () {
        Route::get('list','App\Http\Controllers\TinTucController@getlist');
        Route::get('add','App\Http\Controllers\TinTucController@getadd');
        Route::post('add','App\Http\Controllers\TinTucController@postadd');
        Route::get('edit/{id}','App\Http\Controllers\TinTucController@getedit');
        Route::post('edit/{id}','App\Http\Controllers\TinTucController@postedit');
        Route::get('delete/{id}','App\Http\Controllers\TinTucController@postdelete');
    });

    Route::prefix('slide')->group(function () {
        Route::get('list','App\Http\Controllers\SlideController@getlist');
        Route::get('add','App\Http\Controllers\SlideController@getadd');
        Route::post('add','App\Http\Controllers\SlideController@postadd');
        Route::get('edit/{id}','App\Http\Controllers\SlideController@getedit');
        Route::post('edit/{id}','App\Http\Controllers\SlideController@postedit');
        Route::get('delete/{id}','App\Http\Controllers\SlideController@postdelete');
    });

    Route::prefix('hedaotao')->group(function () {
        Route::get('list','App\Http\Controllers\HeDaoTaoController@getlist');
        Route::post('list','App\Http\Controllers\HeDaoTaoController@importForm')->name('importhdt');
        Route::post('exporthdt','App\Http\Controllers\HeDaoTaoController@exportIntoExcel')->name('exporthdt');
        Route::get('add','App\Http\Controllers\HeDaoTaoController@getadd');
        Route::post('add','App\Http\Controllers\HeDaoTaoController@postadd');
        Route::get('edit/{mahedaotao}','App\Http\Controllers\HeDaoTaoController@getedit');
        Route::post('edit/{mahedaotao}','App\Http\Controllers\HeDaoTaoController@postedit');
        Route::get('delete/{mahedaotao}','App\Http\Controllers\HeDaoTaoController@postdelete');
    });

    Route::prefix('nganh')->group(function () {
        Route::get('list','App\Http\Controllers\NganhController@getlist');
        Route::post('list','App\Http\Controllers\NganhController@importForm')->name('importnganh');
        Route::post('exporthdt','App\Http\Controllers\NganhController@exportIntoExcel')->name('exportnganh');
        Route::get('add','App\Http\Controllers\NganhController@getadd');
        Route::post('add','App\Http\Controllers\NganhController@postadd');
        Route::get('edit/{manganh}','App\Http\Controllers\NganhController@getedit');
        Route::post('edit/{manganh}','App\Http\Controllers\NganhController@postedit');
        Route::get('delete/{manganh}','App\Http\Controllers\NganhController@postdelete');
    });

    Route::prefix('khoi')->group(function () {
        Route::get('list','App\Http\Controllers\KhoiController@getlist');
        Route::get('add','App\Http\Controllers\KhoiController@getadd');
        Route::post('add','App\Http\Controllers\KhoiController@postadd');
        Route::get('edit/{makhoi}','App\Http\Controllers\KhoiController@getedit');
        Route::post('edit/{makhoi}','App\Http\Controllers\KhoiController@postedit');
        Route::get('delete/{makhoi}','App\Http\Controllers\KhoiController@postdelete');
    });

    Route::prefix('tohop')->group(function () {
        Route::get('list','App\Http\Controllers\ToHopController@getlist');
        Route::get('add','App\Http\Controllers\ToHopController@getadd');
        Route::post('add','App\Http\Controllers\ToHopController@postadd');
        Route::get('edit/{matohop}','App\Http\Controllers\ToHopController@getedit');
        Route::post('edit/{matohop}','App\Http\Controllers\ToHopController@postedit');
        Route::get('delete/{matohop}','App\Http\Controllers\ToHopController@postdelete');
    });

    Route::prefix('phuongthuc')->group(function () {
        Route::get('list','App\Http\Controllers\PhuongThucController@getlist');
        Route::get('add','App\Http\Controllers\PhuongThucController@getadd');
        Route::post('add','App\Http\Controllers\PhuongThucController@postadd');
        Route::get('edit/{maphuongthuc}','App\Http\Controllers\PhuongThucController@getedit');
        Route::post('edit/{maphuongthuc}','App\Http\Controllers\PhuongThucController@postedit');
        Route::get('delete/{maphuongthuc}','App\Http\Controllers\PhuongThucController@postdelete');
    });

    Route::prefix('monthi')->group(function () {
        Route::get('list','App\Http\Controllers\MonThiController@getlist');
        Route::get('add','App\Http\Controllers\MonThiController@getadd');
        Route::post('add','App\Http\Controllers\MonThiController@postadd');
        Route::get('edit/{mamon}','App\Http\Controllers\MonThiController@getedit');
        Route::post('edit/{mamon}','App\Http\Controllers\MonThiController@postedit');
        Route::get('delete/{mamon}','App\Http\Controllers\MonThiController@postdelete');
    });

    Route::prefix('hoidongthi')->group(function () {
        Route::get('list','App\Http\Controllers\HoiDongThiController@getlist');
        Route::get('add','App\Http\Controllers\HoiDongThiController@getadd');
        Route::post('add','App\Http\Controllers\HoiDongThiController@postadd');
        Route::get('edit/{mahoidongthi}','App\Http\Controllers\HoiDongThiController@getedit');
        Route::post('edit/{mahoidongthi}','App\Http\Controllers\HoiDongThiController@postedit');
        Route::get('delete/{mahoidongthi}','App\Http\Controllers\HoiDongThiController@postdelete');
    });
});



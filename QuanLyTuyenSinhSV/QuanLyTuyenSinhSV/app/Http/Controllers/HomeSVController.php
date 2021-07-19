<?php

namespace App\Http\Controllers;

use App\Models\HoSo;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\Slide;

class HomeSVController extends Controller
{
    function __construct()
    {
        $loaitin = LoaiTin::all();
        $slide = Slide::all();
        view()->share('loaitin',$loaitin);
        view()->share('slide',$slide);
    }
    public function index(){
        
        //$loaitin = LoaiTin::all();
        return view('home');
    }

    public function lienhe(){
        //$loaitin = LoaiTin::all();
        return view('lienhe');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQuaTuyenSinh extends Model
{
    protected $table="ketquatuyensinh";
    protected $primaryKey = 'mahspt';


    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }

    public function khoi(){
        return $this->belongsTo('App\Models\Khoi','makhoi','makhoi');
    }

    public function scopeMaHoSo($query, $request){
        if($request->has('mahoso')){
            $query->join('hoso_phuongthuc','ketquatuyensinh.mahspt','=','hoso_phuongthuc.mahspt')
                ->join('hoso','hoso_phuongthuc.mahoso','=','hoso.mahoso')
                ->join('phuongthucxettuyen','hoso_phuongthuc.maphuongthuc','=','phuongthucxettuyen.maphuongthuc')
                ->join('nganh','ketquatuyensinh.manganh','=','nganh.manganh')
                ->join('khoithi','ketquatuyensinh.makhoi','=','khoithi.makhoi')
                ->get()
                ->where('mahoso',$request->mahoso);
        }

        return $query;
    }
}

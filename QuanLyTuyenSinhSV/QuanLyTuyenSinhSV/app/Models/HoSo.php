<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    protected $table="hoso";
    protected $primaryKey = 'mahoso';

    public function trangthai(){
        return $this->hasOne('App\Models\TrangThaiHoSo','matrangthai','matrangthai');
    }

    public function hoidongthi(){
        return $this->belongsTo('App\Models\HoiDongThi','mahoidongthi','mahoidongthi');
    }

    public function scopeMaHoSo($query, $request){
        if($request->has('mahoso')){
            $query->where('mahoso',$request->mahoso);
        }
        return $query;
    }

    public function scopeHoTen($query, $request){
        if($request->has('hoten')){
            $query->where('hoten','LIKE','%'.$request->hoten.'%');
        }
        return $query;
    }

    public function scopeDotXetTuyen($query, $request){
        if($request->has('dotxettuyen')){
            $query->where('dotxettuyen',$request->dotxettuyen);
        }
        return $query;
    }

    public function scopeTrangThai($query, $request){
        if($request->has('trangthai')){
            $query->where('matrangthai',$request->trangthai);
        }
        return $query;
    }


}

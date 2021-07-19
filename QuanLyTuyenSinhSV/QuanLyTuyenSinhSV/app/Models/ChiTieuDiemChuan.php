<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTieuDiemChuan extends Model
{
    protected $table = "chitieu_diemchuan";
    protected $primaryKey = "machitieudiemchuan";

    public function phuongthuc(){
        return $this->belongsTo('App\Models\PhuongThuc','maphuongthuc','maphuongthuc');
    }

    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }
}

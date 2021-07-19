<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhatKyDuyet extends Model
{
    protected $table="nhatkyduyet";

    public function nguoiduyet(){
        return $this->belongsTo('App\Models\NguoiDuyet','manguoiduyet','manguoiduyet');
    }

    public function hoso(){
        return $this->belongsTo('App\Models\HoSo','mahoso','mahoso');
    }

    public function trangthai(){
        return $this->belongsTo('App\Models\TrangThaiHoSo','matrangthai','matrangthai');
    }
}

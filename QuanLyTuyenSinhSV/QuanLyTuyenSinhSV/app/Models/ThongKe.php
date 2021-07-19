<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    use HasFactory;
    protected $table="thongke";

    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }

    public function phuongthuc(){
        return $this->belongsTo('App\Models\PhuongThuc','maphuongthuc','maphuongthuc');
    }
}

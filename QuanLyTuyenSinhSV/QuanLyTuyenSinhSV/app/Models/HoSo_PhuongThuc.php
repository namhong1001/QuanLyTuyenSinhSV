<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSo_PhuongThuc extends Model
{
    protected $table="hoso_phuongthuc";
    protected $primaryKey = 'mahspt';

    public function phuongthuc(){
        return $this->belongsTo('App\Models\PhuongThuc','maphuongthuc','maphuongthuc');
    }
}

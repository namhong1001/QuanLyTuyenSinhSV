<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemChuan extends Model
{
    use HasFactory;
    protected $table = "diemchuan";
    protected $primaryKey = "madiemchuan";

    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }

    public function phuongthuc(){
        return $this->belongsTo('App\Models\PhuongThuc','maphuongthuc','maphuongthuc');
    }
}

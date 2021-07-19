<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanTramChiTieu extends Model
{
    use HasFactory;

    protected $table="phantramchitieu";

    public function phuongthuc(){
        return $this->belongsTo('App\Models\PhuongThuc','maphuongthuc','maphuongthuc');
    }
}

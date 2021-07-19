<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNganhKhoi extends Model
{
    protected $table="chitietnganhkhoi";

    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }

    public function khoi(){
        return $this->belongsTo('App\Models\Khoi','makhoi','makhoi');
    }
}

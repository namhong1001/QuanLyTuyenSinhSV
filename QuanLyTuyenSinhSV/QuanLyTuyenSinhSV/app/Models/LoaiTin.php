<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table="loaitin";

    public function tintuc(){
        return $this->hasMany('App\Models\TinTuc','idLoaiTin','id');
    }
}

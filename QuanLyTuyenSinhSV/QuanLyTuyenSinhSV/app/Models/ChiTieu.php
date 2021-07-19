<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTieu extends Model
{
    protected $table = "chitieu";
    protected $primaryKey = "machitieu";

    public function nganh(){
        return $this->belongsTo('App\Models\Nganh','manganh','manganh');
    }
}

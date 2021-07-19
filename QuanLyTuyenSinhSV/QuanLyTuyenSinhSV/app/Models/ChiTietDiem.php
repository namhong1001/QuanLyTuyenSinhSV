<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDiem extends Model
{
    protected $table="chitietdiem";

    public function mon(){
        return $this->belongsTo('App\Models\MonThi','mamon','mamon');
    }
}

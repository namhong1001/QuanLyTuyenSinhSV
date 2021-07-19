<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    protected $table="nganh";
    protected $primaryKey = 'manganh';

    public function hedaotao(){
        return $this->belongsTo('App\Models\HeDaoTao','mahedaotao','mahedaotao');
    }

    protected $fillable = ['manganh','tennganh','mahedaotao'];
}

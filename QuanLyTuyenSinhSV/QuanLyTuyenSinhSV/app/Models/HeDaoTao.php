<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeDaoTao extends Model
{
    protected $table="hedaotao";
    protected $primaryKey = 'mahedaotao';

    protected $fillable = ['tenhedaotao'];
}

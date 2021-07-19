<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonThi extends Model
{
    protected $table="monthi";
    protected $primaryKey = 'mamon';

    public function tohop(){
        return $this->belongsTo('App\Models\ToHop','matohop','matohop');
    }
}

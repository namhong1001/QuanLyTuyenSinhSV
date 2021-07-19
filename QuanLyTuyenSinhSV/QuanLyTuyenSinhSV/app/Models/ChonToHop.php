<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChonToHop extends Model
{
    protected $table="chitietchontohop";

    public function tohop(){
        return $this->belongsTo('App\Models\ToHop','matohop','matohop');
    }
}

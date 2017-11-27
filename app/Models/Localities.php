<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Localities extends Model
{
    protected  $table = "localidades";
    protected  $fillable = ['id', 'descripcion_lo'];

    public function guides2(){
    	return $this->belongsToMany('hive\Models\Guides')
    }
}

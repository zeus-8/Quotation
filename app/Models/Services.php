<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected  $table = "servicios";
    protected  $fillable = ['id', 'descripcion_ser', 'costo_ser'];

    public function pakages2(){
    	return $this->belongsToMany('hive\Models\Pakages')
    }
}

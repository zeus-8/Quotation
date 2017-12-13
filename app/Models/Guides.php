<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    protected  $table = "guias";
    protected  $fillable = ['id', 'nombre', 'apellido', 'cedula', 'celular', 'fijo', 'direccion', 'email'];

    public function pakage3(){
    	return $this->belongsToMany('hive\Models\Pakages');
    }

    public function localities(){
    	return $this->belongsToMany('hive\Models\Localities');
    }
}

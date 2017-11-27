<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    protected  $tables = "guias";
    protected  $fillable = ['id', 'nombre_g', 'apellido_g', 'cedula_g', 'celular_g', 'fijo_g', 'direccion_g', 'email_g'];

    public function pakage3(){
    	return $this->belongsToMany('hive\Models\Pakages')
    }

    public function localities(){
    	return $this->belongsToMany('hive\Models\Localities')
    }
}

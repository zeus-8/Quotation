<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected  $table = "transportes";
    protected  $fillable = ['id', 'nombre_chofer', 'apellido_chofer', 'cedula', 'telef_chofer', 'descripcion_trans', 'id_emp', 'id_tt' ];

    public function business(){
    	return $this->belongsTo('hive\Business');
    }

    public function type_transport(){
    	return $this->belongsToMany('hive\Models\Type_Transport');
    }
    public function pakage4(){
    	return $this->belongsToMany('hive\Models\Pakage');
    }
}

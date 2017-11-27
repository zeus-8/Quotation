<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected  $table = "transportes";
    protected  $fillable = ['id', 'nombre_trans', 'nombre_chofer', 'apellido_chofer', 'costo_trans', 'descripcion_trans', 'tipo_trans_id'];

    public function type_transport(){
    	return $this->belongsTo('hive\Models\Type_Transport')
    }
    public function pakage4(){
    	return $this->belongsToMany('hive\Models\Pakage')
    }
}

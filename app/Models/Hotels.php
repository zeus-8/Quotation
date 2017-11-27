<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected  $table = "hoteles";
    protected  $fillable = ['id', 'nombre_h', 'direccion_h', 'celular_h', 'fijo', 'email', 'costo_noche_h', 'costo_desayuno_h', 'costo_almuerzo_h', 'costo_cena_h', 'tipo_habi_id'];

    public function type_room(){
    	return $this->hasMany('hive\Moles\Types_Room');
    }

    public function pakages5(){
    	return $this->belongsToMany('hive\Models\Pakages');
    }
}

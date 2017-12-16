<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotels extends Model
{
	use SoftDeletes;

    protected  $table = "hoteles";
    protected  $fillable = ['id', 'nombre', 'direccion', 'celular', 'fijo', 'email', 'contacto', 'costo_noche', 'costo_desayuno', 'costo_almuerzo', 'costo_cena'];

    public function typeroom(){
    	return $this->belongsToMany('hive\Models\Type_Room', 'hot_hab')->withPivot('id_hot', 'costo')->using('hive\Models\hot_hab');
    }

    public function pakages5(){
    	return $this->belongsToMany('hive\Models\Pakages');
    }

    public function type_hostel(){
    	return $this->belongsTo('');
    }
    public function serviHotel(){
        return $this->belongsTo('hive\ServiHotel.php');
    }
}

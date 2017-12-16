<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = "restaurant";
    protected $fillable = ['id', 'nombre', 'direccion', 'telefono', 'costo_desayuno', 'costo_almuerzo', 'costo_cena', 'en_hotel'];

    public function hostels1(){
    	return $this->hasmany('hive\Hotels.php');
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	use SoftDeletes;

    protected $table = "clientes";
    protected $fillable = ['id', 'nombre', 'apellido', 'cedula', 'celular', 'fijo', 'email', 'direccion', 'sexo', 'estado_civil', 'fech_nac'];

    public function bills(){
    	return $this->hasmany('hive\Models\Bill.php');
    }
}

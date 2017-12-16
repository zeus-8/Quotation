<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use SoftDeletes;

    protected  $table = "transportes";
    protected  $fillable = ['id', 'nombre_chofer', 'apellido_chofer', 'cedula', 'telef_chofer', 'descripcion_trans', 'id_emp', 'id_tt' ];

    public function company(){
    	return $this->belongsTo('hive\Business');
    }

    public function type_transport(){
        return $this->belongsTo('hive\Type_Transport.php');
    }
    public function pakage4(){
    	return $this->belongsToMany('hive\Models\Pakage');
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = "fechas";
    protected $fillable = ['id', 'descripcion', 'fecha_ini', 'fecha_fin'];

    public function pakagesDate(){
    	return $this->belongsToMany('hive\Models\pakages');
    }
}

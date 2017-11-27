<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Cot_Ven extends Model
{
    protected  $table = "cot_vem";
    protected  $fillable = ['id', 'descripcion_cv', 'id_u'];

    public function user(){
    	return $this->belongsTo('hive\User')
    }

    public function pakages(){
    	return $this->belongsToMany('hive\Models\Pakages')
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Type_User extends Model
{
    protected  $table = "tipo_usu";
    protected  $fillable = ['id', 'descripcion'];

    public function users(){
    	return $this->hasMany('hive\User');
    }
}

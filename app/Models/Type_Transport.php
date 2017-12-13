<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Transport extends Model
{
	protected  $table = "tipo_trans";
	protected  $fillable = ['id', 'descripcion'];

	public function transpotation(){
		return $this->belongsToMany('hive\Models\Transport');
	}
}

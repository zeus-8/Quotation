<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Transport extends Model
{
	protected  $table = "tipo_trans";
	protected  $fillable = ['id', 'descripcion_tran'];

	public function transpotation(){
		return $this->hasmany('hive\Models\Transport');
	}
}

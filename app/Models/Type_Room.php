<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Room extends Model
{
	protected  $table = "tipo_habi";
	protected  $fillable = ['id', 'descripcion_habi'];

	public function hostels(){
		return $this->belongsTo('hive\Models\Hotels');
	}
}

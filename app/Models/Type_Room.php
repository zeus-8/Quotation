<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Type_Room extends Model
{
	use SoftDeletes;

	protected  $table = "habitaciones";
	protected  $fillable = ['id', 'descripcion'];

	public function hostels(){
		return $this->belongsToMany('hive\Models\Hotels','hot_hab')->withPivot('id_hab', 'costo');
	}
}

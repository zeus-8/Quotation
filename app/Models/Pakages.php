<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Pakages extends Model
{
    protected  $table = "paquetes";
    protected  $fillable = ['id', 'titulo', 'descripcion'];

    public function services(){
    	return $this->belongsToMany('hive\Models\Services');
    }

    public function guides(){
    	return $this->belongsToMany('hive\Models\Guides');
    }

    public function transport(){
        return $this->belongsToMany('hive\Models\Transport');
    }

    public function hotels(){
        return $this->belongsToMany('hive\Models\Hostels');
    }
    public function bills2(){
        return $this->hasmany('hive\Models\Bill');
    }
    public function datePakage(){
        return $this->belongsToMany('hive\Models\Date');
    }

}

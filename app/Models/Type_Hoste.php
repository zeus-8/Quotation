<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Hoste extends Model
{
    protected $table = "tipo_hotel";
    protected $fillable = ['id', 'tipo'];

    public function hostels(){
    	return $this->hasmany('hive\Hotels.php');
    }
    public function restaurant(){
    	return $this->belongsTo('hive\Restaurant.php');
    }
}

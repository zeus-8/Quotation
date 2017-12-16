<?php

namespace hive;

use Illuminate\Database\Eloquent\Model;

class ServiHotel extends Model
{
    protected $table = "servi_hotel";
    protected $fillable = ['id', 'servicio'];

    public function hostels3(){
    	return $this->hasmany('hive\Hotels.php');
    }
}

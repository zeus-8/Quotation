<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = "empresa";
    protected $fillable = ['id', 'nombre'];

    public function transport1(){
    	return $this->hasmany('hive\Transport.php');
    }
}

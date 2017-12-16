<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = "empresa";
    protected $fillable = ['id', 'nombre'];

    public function transports1(){
    	return $this->hasmany('hive\Transport.php');
    }
}

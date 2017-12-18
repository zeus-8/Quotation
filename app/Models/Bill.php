<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
	use  SoftDeletes;

    protected $table = "facturas";
    protected $fillable = ['id', 'observacion', 'nfactura', 'id_use', 'id_paq', 'id_cli', ''];

    public function client(){
    	return $this->belongsTo('hive\Models\Client.php');
    }
    public function pakage5(){
    	return $this->belongsTo('hive\Models\Pakages');
    }
    public function user(){
    	return $this->belongsTo('hive\User');
    }
}

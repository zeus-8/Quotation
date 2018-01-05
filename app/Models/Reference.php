<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = "references";
    protected $fillable = ['id', 'reference'];

    public function guides(){
    	return $this->hasmany('hive\Models\guide');
    }
    public function transfers(){
    	return $this->hasmany('hive\Models\Transfer');
    }
    public function localitie(){
    	return $this->belongsTo('hive\Models\Localitie');
    }
    public function hotels(){
        return $this->hasmany('hive\Models\Hotel');
    }
}

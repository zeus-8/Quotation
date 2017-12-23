<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $table = "companies";
    protected $fillable = ['id', 'co_name'];

    public function transfers(){
        return $this->hasMany('hive\Models\Transfer');
    }
}

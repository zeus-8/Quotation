<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Thotel extends Model
{
    protected $table = "thotels";
    protected $fillable = ['id', 'type_hotel'];

    public function hotels(){
        return $this->hasMany('hive\Models\Hotels');
    }
}

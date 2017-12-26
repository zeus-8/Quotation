<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Localitie extends Model
{
    protected $table = "localities";
    protected $fillable = ['id', 'localite'];

    public function guides(){
        return $this->belongsToMany('hive\Models\Guides');
    }
}

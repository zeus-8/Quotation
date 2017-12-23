<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Shotel extends Model
{
    protected $table = "shotels";
    protected $fillable = ['id', 'sh_service'];

    public function hotels(){
        return $this->hasMany('hive\Models\Hotels');
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Localitie extends Model
{
    protected $table = "localities";
    protected $fillable = ['id', 'localitie',];

    public function references(){
        return $this->hasmany('hive\Models\Reference');
    }
}

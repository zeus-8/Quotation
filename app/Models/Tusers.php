<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Tusers extends Model
{
    protected $table = "tusers";
    protected $fillable = ['id', 'type_user'];

    public function useres(){
        return $this->hasMany('hive\Models\Users')
    }
}

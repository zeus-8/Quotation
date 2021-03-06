<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Ttransfer extends Model
{
    protected $table = "ttransfers";
    protected $fillable = ['id', 'tt_transfer'];

    public function transfers(){
        return $this->hasMany('hive\Models\Transfers');
    }
}

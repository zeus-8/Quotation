<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['id', 'Cu_name', 'cu_last_name', 'cu_id_card_ruc', 'cu_cell_phone', 'cu_phone', 'cu_email', 'cu_addres', 'cu_sex', 'cu_civil_status', 'cu_brithdate'];

    public function bills(){
        return $this->hasMany('hive\Models\Bill');
    }
}

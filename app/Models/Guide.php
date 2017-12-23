<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = "guides";
    protected $fillable = ['id', 'gu_name', 'gu_last_name', 'gu_id_card', 'gu_cell_phone', 'gu_phone', 'gu_addres', 'gu_email'];

    public function localities(){
        return $this->belongsToMany('hive\Models\Localites');
    }
    public function packages(){
        return $this->belongsToMany('hive\Models\Packages');
    }
}

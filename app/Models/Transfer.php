<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transfer extends Model
{
    use SoftDeletes;

    protected $table = "transfers";
    protected $fillable = ['id', 'tr_name', 'tr_last_name', 'tr_id_card', 'tr_cell_phone', 'tr_coment', 'companie_id', 'tr_cost', 'ttransfer_id'];

    public function companie(){
        return $this->belongsTo('hive\Moldes\Companies');
    }
    public function ttransfer(){
        return $this->belongsTo('hive\Models\Ttransfers');
    }
    public function packages(){
        return $this->belongsToMany('hive\Models\Pakage');
    }
    public function reference(){
        return $this->belongsTo('hive\Models\Reference.php');
    }
}

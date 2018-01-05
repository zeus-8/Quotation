<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Guide extends Model
{
	use SoftDeletes;

    protected $table = "guides";
    protected $fillable = ['id', 'gu_name', 'gu_last_name', 'gu_id_card', 'gu_cell_phone', 'gu_phone', 'gu_address', 'gu_email', 'cost', 'reference_id'];

    public function reference(){
    	return $this->belongsTo('hive\Models\Reference');
    }
    public function packages(){
        return $this->belongsToMany('hive\Models\Packages');
    }
}

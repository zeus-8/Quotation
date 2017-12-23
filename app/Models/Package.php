<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "packages";
    protected $fillable = ['id', 'pa_name', 'pa_activities', 'pa_coment', 'pa_cost', 'pa_observations'];

    public function dates(){
        return $this->belongsToMany('hive\Moldels\Date');
    }
    public function guides(){
        return $this->belongsToMany('hive\Models\Guide');
    }
    public function bill(){
        return $this->belongsTo('hive\Models\Bill')
    }
    public function transfers(){
        return $this->belongsToMany('hive\Models\Transfer');
    }
}

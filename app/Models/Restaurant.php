<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    protected $table = "restaurants";
    protected $fillable = ['id', 're_name', 're_address', 're_cell_phone', 're_phone', 're_cost_breakfast', 're_cost_lunch', 're_cost_dinner', 're_in_hotel'];

    public function hotels(){
        return $this->hasMany('hive\Models\Hotels');
    }

}

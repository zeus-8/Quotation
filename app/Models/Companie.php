<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Companie extends Model
{
    use SoftDeletes;
    
    protected $table = "companies";
    protected $fillable = ['id', 'co_name'];

    public function transfers(){
        return $this->hasMany('hive\Models\Transfer');
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = "dates";
    protected $fillable = ['id', 'da_date', 'da_date_init', 'da_date_end'];

    public function packages(){
        return $this->belongsToMany('hive\Models\Packages');
    }
}

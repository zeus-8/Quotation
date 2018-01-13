<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $fillable = ['id', 'bi_coment', 'bi_date', 'bi_hour', 'bi_nbill', 'bi_bill_ref', 'user_id', 'package_id', 'customer_id']

    public function user(){
        return $this->belongsTo('hive\Models\User');
    }
    public function customer(){
        return $this->belongsTo('hive\Models\Customer')
    }
    public function packages(){
        return->$this->hasMany('hive\Models\Package');
    }
}

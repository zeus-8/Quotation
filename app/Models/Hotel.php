<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['id', 'ho_name', 'ho_address', 'ho_cell_phone', 'ho_phone', 'ho_email', 'ho_contac', 'thotel_id', 'restaurant_id', 'shotel_id', 'reference_id'];

    public function thotel(){
        return $this->belongsTo('hive\Models\Thotel');
    }
    public function restaurant(){
        return $this->belongsTo('hive\Models\Restaurant');
    }
    public function shotel(){
        return $this->belongsTo('hive\Models\Shotel');
    }
    public function rooms(){
        return $this->belongsToMany('hive\Models\Room')->withPivot('hotel_room', 'cost');
    }
    public function reference(){
        return $this->belongsTo('hive\Models\Reference');
    }
}

<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";
    protected $fillable = ['id', 'room'];

    public function hotels(){
        return $this->belongsToMany('hive\Modles\Hotel', 'hotel_room');
    }
}

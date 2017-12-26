<?php

namespace hive;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'id', 'name', 'us_last_name', 'us_id_card', 'email', 'us_cell_phone', 'us_phone', 'us_address', 'password', 'tuser_id'
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tuser(){
        return $this->belongsTo('hive\Models\Tusers');
    }
    public function bill(){
        return $this->belongsTo('hive\Models\Bill');
    }

}

<?php

namespace hive;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
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
    protected $fillable = [
        'id', 'name', 'apellido', 'cedula', 'email', 'celular', 'fijo', 'direccion', 'password', 'id_tu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function types_users(){
        return $this->belongsTo('hive\Models\Types_User');
    }

    public function quotations(){
        return $this->hasmany('hidden\Models\Cot_Ven');
    }
}

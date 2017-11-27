<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    protected  $table = "impuestos";
    protected  $fillable = ['id', 'descripcion_im', 'valor_im'];
}

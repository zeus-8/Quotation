<?php

namespace hive\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = "quotations";
    protected $fillable = [
					    	'id', 
					    	'n_quotation', 
					    	'nights', 
					    	'breakfast', 
					    	'lunch', 
					    	'dinner', 
					    	'localitie_id', 
					    	'reference_id', 
					    	'guide_id', 
					    	'transfer_id', 
					    	'ta', 
					    	'ia', 
					    	'tn', 
					    	'in', 
					    	'tte', 
					    	'ite', 
					    	'te', 
					    	'ie', 
					    	'tne', 
					    	'ine', 
					    	'cant_a', 
					    	'cant_n', 
					    	'cant_te', 
					    	'cant_e', 
					    	'cant_ne', 
					    	'coment', 
					    	'status', 
					    	'customer_id'
					    ];

    public function package(){
    	return $this->belongsTo('hive\Models\Package');
    }
}

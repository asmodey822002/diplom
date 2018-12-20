<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function tehnika(){
	    return $this->belongsTo('App\Models\Tehnika', 'client_id', 'id');
	}
	public function kartridjes(){
	    return $this->belongsTo('App\Models\Kartridjes', 'client_id', 'id');
	}
	/*public function hasKartridjes(){
	    return $this->belongsToMany('App\Models\Kartridjes', 'client_id', 'id');
	}*/
}

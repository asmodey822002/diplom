<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sostoyanies extends Model
{
    public function kartridjes(){
	    return $this->belongsTo('App\Models\Kartridjes', 'sostoyanies_id', 'id');
	}
	public function tehnika(){
	    return $this->belongsTo('App\Models\Tehnika', 'sostoyanies_id', 'id');
	}
}

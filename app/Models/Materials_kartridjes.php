<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials_kartridjes extends Model
{
    public function kartridjes(){
	    return $this->belongsTo('App\Models\Kartridjes', 'materials_kartridjes_id', 'id');
	}
	/*public function kart(){
	    return $this->belongsToMany('App\Models\Kartridjes', 'materials_kartridjes_id', 'id');
	}*/
}

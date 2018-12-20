<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials_tehnik extends Model
{
    public function tehnika(){
	    return $this->belongsTo('App\Models\Tehnika', 'materials_tehnik_id', 'id');
	}
}

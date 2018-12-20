<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models_kartridjes extends Model
{
    public function kartridjes(){
	    return $this->belongsTo('App\Models\Kartridjes', 'models_kartridjes_id', 'id');
	}
}

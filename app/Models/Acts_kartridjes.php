<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acts_kartridjes extends Model
{
    public function kartridjes(){
	    return $this->hasOne('App\Models\Kartridjes', 'id', 'kartridjes_id');
	}
}

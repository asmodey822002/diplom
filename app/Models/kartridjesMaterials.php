<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kartridjesMaterials extends Model
{
    public function hasKartridjes(){
		return $this->belongsTo('App\Models\Kartridjes', 'id', 'kartridjes_id');
	}
}

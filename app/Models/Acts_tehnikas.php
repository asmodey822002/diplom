<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acts_tehnikas extends Model
{
    public function tehnika(){
	    return $this->belongsToMany('App\Models\Tehnika', 'id', 'tehnikas_id');
	}
}

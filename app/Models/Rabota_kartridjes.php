<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rabota_kartridjes extends Model
{
    public function kart_id(){
	    return $this->belongsToMany('App\Models\Kartridjes', 'id', 'kartridjes_id');
	}
}

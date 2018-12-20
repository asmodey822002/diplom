<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
    public function users()
    {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
	}
	public function usersId()
    {
    return $this->belongsTo('App\Models\User', 'id', 'users_id');
	}
	public function tehnika(){
	    return $this->belongsTo('App\Models\Tehnika', 'masters_id', 'id');
	}
	public function kartridjes(){
	    return $this->belongsTo('App\Models\Kartridjes', 'masters_id', 'id');
	}
}

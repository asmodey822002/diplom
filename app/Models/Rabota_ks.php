<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rabota_ks extends Model
{
    public function kartridjes(){
	    return $this->belongsToMany('App\Models\Kartridjes', 'rabota_kartridjes', 'rabota_id', 'kartridjes_id');
	}
	/*public function roles()
    {
    return $this->belongsToMany('App\Models\Role', 'users_roles', 'user_id', 'role_id');
    }*/
}

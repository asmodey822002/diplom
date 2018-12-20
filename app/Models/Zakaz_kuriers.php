<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zakaz_kuriers extends Model
{
    public function users()
    {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
	}
	public function sosts()
    {
    return $this->belongsToMany('App\Models\Vizov_sosts', 'kuriers_sosts', 'vizov_sost_id', 'zakaz_kuriers_id');
    }
    public function hasSosts()
    {
    return $this->hasOne('App\Models\Kuriers_sosts', 'zakaz_kuriers_id', 'id');
    }
}

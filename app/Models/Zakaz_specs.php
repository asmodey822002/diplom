<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zakaz_specs extends Model
{
    public function users()
    {
    return $this->hasOne('App\Models\User', 'id', 'users_id');
	}
	public function sosts()
    {
    return $this->belongsToMany('App\Models\Vizov_sosts', 'specs_sosts', 'vizov_sost_id', 'zakaz_spec_id');
    }
    public function hasSosts()
    {
    return $this->hasOne('App\Models\Specs_sosts', 'zakaz_spec_id', 'id');
    }
}

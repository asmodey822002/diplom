<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kartridjes extends Model
{
    public function models_kartridjes()
    {
    return $this->hasOne('App\Models\Models_kartridjes', 'id', 'models_kartridjes_id');
	}
	public function masters()
    {
    return $this->hasOne('App\Models\Masters', 'id', 'master_id');
	}
	public function sostoyanies(){
	    return $this->hasOne('App\Models\Sostoyanies', 'id', 'sostoyanies_id');
	}
	public function materials_kartridjes(){
	    return $this->hasOne('App\Models\Materials_kartridjes', 'id', 'materials_kartridjes_id');
	}
	/*public function materials_kart(){
	    return $this->belongsToMany('App\Models\Materials_kartridjes', 'id', 'materials_kartridjes_id');
	}*/
	public function client(){
	    return $this->hasOne('App\Models\Client', 'id', 'client_id');
	}
	/*public function hasClient(){
	    return $this->belongsToMany('App\Models\Client', 'id', 'client_id');
	}*/
	public function acts_kartridjes(){
	    return $this->belongsTo('App\Models\Acts_kartridjes', 'kartridjes_id', 'id');
	}
	public function rabota(){
	    return $this->belongsToMany('App\Models\Rabota_ks', 'rabota_kartridjes', 'kartridjes_id', 'rabota_id');
	}
	public function has_id(){
	    return $this->belongsToMany('App\Models\Rabota_kartridjes', 'kartridjes_id', 'id');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tehnika extends Model
{
    public function masters()
    {
    return $this->hasOne('App\Models\Masters', 'id', 'master_id');
	}
	public function sostoyanies(){
	    return $this->hasOne('App\Models\Sostoyanies', 'id', 'sostoyanies_id');
	}
	public function categories_teh(){
	    return $this->belongsTo('App\Models\Categories_teh', 'id', 'categories_teh_id');
	}
	public function materials_tehnik(){
	    return $this->hasOne('App\Models\Materials_tehnik', 'id', 'materials_tehnik_id');
	}
	public function client(){
	    return $this->hasOne('App\Models\Client', 'id', 'client_id');
	}
	public function acts_tehnikas(){
	    return $this->belongsToMany('App\Models\Acts_tehnikas', 'tehnikas_id', 'id');
	}
}

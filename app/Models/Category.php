<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
    	return $this->hasMany('App\Models\Product');
  	}
  	function setSlugAttribute($value){//$value - то что хотим записать
	    if(empty($value)){
	    $this->attributes['slug']=str_slug($this->attributes['name'], '-');
	    }
	    else{
	        $this->attributes['slug']=str_slug($value, '-');
	    }
	}
	function getImgPathAttribute($value){
		return empty($value)?'/images/NonIzo.png':$value;
	}
}

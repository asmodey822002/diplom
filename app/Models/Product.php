<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
	    return $this->belongsTo('App\Models\Category', 'category_id', 'id');
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
	//метод читателя для галереи
	function getGalleryAttribute($value){
		return !empty($value)?json_decode($value):$value;
	}
	function setGalleryAttribute($value){
		$value=explode(',', $value);
		$this->attributes['gallery']=json_encode($value);
	}
}

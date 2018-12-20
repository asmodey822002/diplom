<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories_teh extends Model
{
    public function tehnika(){
	    return $this->belongsTo('App\Models\Tehnika', 'categories_teh_id', 'id');
	}
}

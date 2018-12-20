<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specs_sosts extends Model
{
    public function hasZakaz()
    {
    return $this->belongsTo('App\Models\Zakaz_specs', 'id', 'zakaz_spec_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vizov_sosts extends Model
{
    public function sosts()
    {
    return $this->belongsToMany('App\Models\Zakaz_kuriers', 'kuriers_sosts', 'zakaz_kuriers_id', 'vizov_sost_id');
    }
    public function sostsSpec()
    {
    return $this->belongsToMany('App\Models\Zakaz_specs', 'specs_sosts', 'zakaz_spec_id', 'vizov_sost_id');
    }
}

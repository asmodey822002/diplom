<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles()
    {
    return $this->belongsToMany('App\Models\Role', 'users_roles', 'user_id', 'role_id');
    }
    public function hasRole($role)
    {
        return in_array($role, array_pluck($this->roles->toArray(), 'name'));
    }
    public function masters()
    {
    return $this->belongsTo('App\Models\Masters', 'users_id', 'id');
    }
    public function mastersId()
    {
    return $this->hasOne('App\Models\Masters', 'users_id', 'id');
    }
    public function kuriers()
    {
    return $this->belongsTo('App\Models\Zakaz_kuriers', 'users_id', 'id');
    }
    public function specs()
    {
    return $this->belongsTo('App\Models\Zakaz_specs', 'users_id', 'id');
    }
}

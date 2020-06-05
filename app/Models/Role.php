<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $timestamps = false;

    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        $this->hasMany('App\Models\User', 'role_id');
    }
}

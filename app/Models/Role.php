<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function getUsersRelationValue($key)
    {
        {
            return $this->belongsToMany(User::class, 'role_user');
        }
    }
    public $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
        // many to many dengan table roles
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}

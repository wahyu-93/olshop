<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        // many to many dengan table permissions
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}

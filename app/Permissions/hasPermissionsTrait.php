<?php

namespace App\Permissions;

use App\Models\Permission;
use App\Models\Role;

trait hasPermissionsTrait
{
    public function hasRole(...$roles)
    {
        foreach($roles as $role){
            if($this->roles->contains('nama', $role)){
                return true;
            }
        }

        return false;
    }

    public function roles()
    {
        // user m to m dengan table role
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        // user m to m dengan table permission
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}
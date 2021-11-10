<?php

namespace App\Permissions;

use App\Models\Permission;
use App\Models\Role;

trait hasPermissionsTrait
{
    protected function hasPermissionThroughRole($permissions)
    {
        foreach($permissions->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }

        return false;
    }

    protected function hasPermission($permissions)
    {
        return (bool) $this->permissions->where('nama', $permissions->nama)->count();
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('nama', $permissions)->get();
    }
    
    public function givePermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));
        
        if ($permissions==null){
            return $this;
        }
        
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function updatePermissions(...$permissions)
    {
        $this->permissions()->detach();
        $this->givePermissions($permissions);
        return $this;
    }

    public function revokePermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));
        
        if($permissions==null){
            return $this;
        }

        $this->permissions()->detach($permissions); 
        return $this;
    }

    public function hasPermissionsTo($permissions)
    {
        //permissions role || permission user
        return $this->hasPermissionThroughRole($permissions) || $this->hasPermission($permissions);
    }


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
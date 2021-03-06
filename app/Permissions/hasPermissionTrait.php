<?php

namespace App\Permissions;

use App\{Role, Permission};

trait HasPermissionsTrait

{

    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));

        if ($permissions === null) {
            return $this;
        }

        $this->permissions()->saveMany($permissions);

        return $this;
    }

    public function withdrawPermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));

        $this->permissions()->detach($permissions);

        return $this;
    }

    public function updatePermissions(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionTo($permissions);
    }

    public function giveRoleTo(...$roles) {
        $roles = $this->getAllRoles(array_flatten($roles));

        if ($roles === null) {
            return $this;
        }

        $this->roles()->saveMany($roles);

        return $this;
    }

    public function withdrawRoleTo(...$roles)
    {
        $roles = $this->getAllRoles(array_flatten($roles));

        $this->roles()->detach($roles);

        return $this;
    }

    public function hasRole(...$roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }
    public function hasPermissionTo($permission) {
        return $this->hasPermissionTroughRole($permission) || $this->hasPermission($permission);
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name', $permissions)->get();
    }

    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();
    }

    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }

    protected function hasPermissionTroughRole($permission) {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
            return false;
        }
    }
    public function roles() {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}
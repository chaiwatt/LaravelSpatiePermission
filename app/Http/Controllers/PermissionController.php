<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function Test(){
        return "ok";
    }

    public function CreatePermission($name){
        Permission::create(['name' => $name]);
    }
    public function CreateRole($name){
        Role::create(['name' => $name]);
    }
    public function AssignRole($role,$permission){
        $role = Role::find($role);
        $permission = Permission::find($permission);
        $permission->assignRole($role);
    }
    public function RemoveRole($role,$permission){
        $role = Role::find($role);
        $permission = Permission::find($permission);
        $permission->removeRole($role);
    }
    public function RevokePermission($role,$permission){
        $role = Role::find($role);
        $permission = Permission::find($permission);
        $role->revokePermissionTo($permission);
    }
    public function GivePermission($role,$permission){
        $role = Role::find($role);
        $permission = Permission::find($permission);
        $role->givePermissionTo($permission);
    }
}


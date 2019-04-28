<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionUserController extends Controller
{
    public function GivePermission($permission,$model){
        $permission = Permission::find($permission);
        $user = User::find($model);
        $user->givePermissionTo($permission);
    }
    public function AssignRole($role,$model){
        $role = Role::find($role);
        $user = User::find($model);
        $user->assignRole($role);
    }
}


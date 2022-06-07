<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::with('roles')->get();
        return view('role', compact('users','roles'));
    }

    public function edit($user)
    {
        $suser = User::findOrFail($user);
        $roles = $suser->getRoleNames();
        return view('role.edit', compact('user', 'roles'));
    }

    public function store($user)
    {
        $suser = User::findOrFail($user);
        $suser->assignRole('editor');
        $roles = $suser->getRoleNames();
        return view('role.edit', compact('user', 'roles'));
    }

    public function delete($user)
    {
        $suser = User::findOrFail($user);
        $suser->removeRole('editor');
        $roles = $suser->getRoleNames();
        return view('role.edit', compact('user', 'roles'));
    }
}

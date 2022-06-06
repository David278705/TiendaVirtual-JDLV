<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleViewController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::with('roles')->get();
        return view('role', compact('users','roles'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,role_name',
        ]);

        $role = Role::create($request->all());

        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,role_name,' . $role->id,
        ]);

        $role->update($request->all());

        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json('Role has been deleted', 200);
    }
}

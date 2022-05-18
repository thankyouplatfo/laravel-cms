<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public $role;
    //
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    //
    public function store(Request $request)
    {
        # code...
        //
        $this->role->find($request->role_id)->permissions()->sync($request->permission);

        //dd($request->all());
        //
        return back();
    }
    //
    public function permissionByRole(Request $data)
    {
        # code...
        $permissions = $this->role->find($data->id)->permissions()->pluck('permission_id');
        //
        return $permissions;
    }
}

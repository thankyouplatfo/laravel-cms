<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public $permission;
    //
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    //
    public function index()
    {
        # code...
        $permissions = $this->permission->all();
        //
        return view('admin.permissions.index',compact('permissions'));
    }
    
}

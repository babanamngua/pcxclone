<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = 'trang permission';
        $permissions = Permission::all();
        return view('admin.role-permission.permission.list_permission',$this->data,['permissions' => $permissions]);
    }
    public function create()
    {
        $this->data['title'] = 'trang tạo permission';
        return view('admin.role-permission.permission.add_permission',$this->data);
    }
    public function store(Request $request)
    {

        $this->data['title'] = 'trang permission';
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Created Successfully');
    }
    public function edit(Permission $permission)
    {
        return view('admin.role-permission.permission.edit_permission', ['permission' => $permission]);
    }
    public function update(Request $request, Permission $permission)
    {
        $this->data['title'] = 'trang permission';
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Updated Successfully');
    }
    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status','Permission Deleted Successfully');
    }
}

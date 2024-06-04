<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public $data =[];
    public function index()
    {        
        $roles1 = Roles::all();
        $this->data['title'] = 'trang Vai trò';
        return view('admin.roles.list_roles',$this->data,compact('roles1'));
    }
    public function create()
    {
        $this->data['title'] = 'trang thêm Vai trò';
        return view('admin.roles.add_roles',$this->data);
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'trang Vai trò';
        $data = $request->validate([
        'role_name' => 'required|string|max:255',
        'description'=>'nullable',
        ]);
        roles::insert($data);
        return redirect()->route('roles.index',$this->data)->with('success', 'Vai trò thêm thành công.');
    }
    public function edit(roles $roles)
    {
        $this->data['title'] = 'trang sửa vai trò';
        return view('admin.roles.edit_roles',$this->data,compact('roles'));
    }
    public function update(Request $request, roles $roles)
    {
        
        $this->data['title'] = 'trang Vai trò';
        $data = $request->validate([
        'role_name' => 'required|string|max:255',
        'description'=>'nullable', 
        ]);
        $roles->update($data);
        return redirect()->route('roles.index',$this->data)->with('success', 'Vai trò đã cập nhật thành công.');
    
    }
    public function destroy(roles $roles)
    {
        $roles->delete();
        return redirect()->route('roles.index',$this->data)->with('success', 'Vai trò đã xóa thành công.');
    }
}

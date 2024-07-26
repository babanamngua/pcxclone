<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public $data =[];


    public function index()
    {
        $users = User::get();
        $this->data['title'] = 'trang users';
        return view('admin.role-permission.user.list_user',$this->data, ['users' => $users]);
    }
    public function create()
    {
        $this->data['title'] = 'trang tạo users';
        $roles = Role::pluck('name','name')->all();
        return view('admin.role-permission.user.add_user',$this->data, ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => ''
        ]);

        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);

        Log::info('User created and roles assigned', ['user' => $user, 'roles' => $user->roles]);


        return redirect('/users')->with('status','User created successfully with roles');
    }

    public function edit(User $user)
    {
        $this->data['title'] = 'trang sửa users';
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('admin.role-permission.user.edit_user',$this->data, [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/users')->with('status','User Delete Successfully');
    }
}

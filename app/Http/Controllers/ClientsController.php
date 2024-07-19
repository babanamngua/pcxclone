<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{
    public $data =[];


    public function index()
    {
        $users = User::get();
        $this->data['title'] = 'trang users';
        return view('admin.clients.list_clients',$this->data, ['users' => $users]);
    }
    public function create()
    {
        $this->data['title'] = 'trang tạo users';
        $roles = Role::pluck('name','name')->all();
        return view('admin.clients.add_clients',$this->data, ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
        ]);

        User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

        return redirect('/clients')->with('status','User created successfully with roles');
    }

    public function edit($userId)
    {
        $this->data['title'] = 'trang sửa users';
        $user = User::findOrFail($userId);
        return view('admin.clients.edit_clients',$this->data,compact('user'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
    
        // Validate input data
        $request->validate([
            'name' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'email' => 'nullable|string|email|max:255',
        ]);
    
        // Check if email is being updated and if it already exists for another user
        if ($request->email && $request->email !== $user->email) {
            $emailExists = User::where('email', $request->email)->exists();
            if ($emailExists) {
                return redirect()->back()->withErrors(['email' => 'The email has already been taken.']);
            }
        }
    
        // Prepare data for updating
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
    
        // Update the user
        $user->update($data);
    
        return redirect('/clients')->with('status', 'User Updated Successfully with roles');
    }
    
    

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/clients')->with('status','User Delete Successfully');
    }
}

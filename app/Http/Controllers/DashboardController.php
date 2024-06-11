<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class DashboardController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang home admin';

        // if (Auth::check()) {
        //     $userId = Auth::user()->user_id;
            
        //     // Kiểm tra xem người dùng có trong bảng admin hay không
        //     $isAdmin = Admin::where('user_id', $userId)->exists();
        //     if ($isAdmin) {
        //         return view('admin.home',$this->data); 
        //     }
        //     else{
        //         $this->data['title'] = 'ban gmg';
        //         return view('clients.home',$this->data);
        //     }
        // }
        return view('admin.home',$this->data); 
    }
}

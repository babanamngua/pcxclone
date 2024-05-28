<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang home admin';
        return view('admin.home',$this->data); 
    }
    public function login()
    {
        if(Auth::check())
        {
            $this->data['title'] = 'trang home admin';
            return view('admin.home',$this->data);
        }else
        {
            $this->data['title'] = 'trang dang nhap admin';
            return view('admin.login',$this->data);
        }  
       
    }
    public function loginCheck(Request $request)
    {
        // $this->data['title'] = 'logincheck';
        // $this->data['message'] = 'Đăng nhập thành công thành công';
        $login = [
            'email' => $request->email,
            'password' =>$request->password,
        ];
        if (Auth::attempt($login)) {
            return view('clients.home')->with('status', 'dang nhap thanh cong');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

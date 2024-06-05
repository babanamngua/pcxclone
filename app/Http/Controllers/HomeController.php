<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang gmg';
 
        if(Auth::id())
        {
            $quanlyornot = Auth()->user()->QuanLyorNot;
            if($quanlyornot == '0')
            {
                return view('clients.home',$this->data); 
            }
            else if($quanlyornot == '1')
            {
                $this->data['title'] = 'trang dashboard';
                return view('admin.home',$this->data);
            }
        }
        return view('clients.home',$this->data); 
    }
    
}

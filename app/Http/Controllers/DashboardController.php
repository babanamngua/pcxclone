<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang home admin';
 
        if(Auth::id())
        {
            $quanlyornot = Auth()->user()->QuanLyorNot;
            if($quanlyornot == '1')
            {
                return view('admin.home',$this->data); 
            }
            else if($quanlyornot == '1')
            {
                $this->data['title'] = 'ban gmg';
                return view('clients.home',$this->data);
            }
        }
    }
}

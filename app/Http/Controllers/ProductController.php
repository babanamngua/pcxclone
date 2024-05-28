<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data =[];
    public function index()
    {        
        $this->data['title'] = 'trang sản phẩm';
        return view('admin.product.list_sanpham',$this->data);
    }
}

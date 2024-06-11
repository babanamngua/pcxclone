<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Category;
use App\Models\Brand;



class HomeController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang sản phẩm';
        $product1 = Product::all();
        $img1 = [];
        $color1 = [];
    
        // Lặp qua từng sản phẩm và lấy các ảnh và màu tương ứng
        foreach ($product1 as $product) {
            $img1[$product->product_id] = Img::where('product_id', $product->product_id)->get();
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        } 
        $category1 = Category::all();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        return view('clients.home',$this->data,compact('category1','brand1','brand2','product1','img1','color1'));
    }
    public function detail($id)
    {   
        $product = Product::findOrFail($id);
        $this->data['title'] = $product->product_name;
        $img2 = Img::where('product_id', $product->product_id)->first();
        $color1 = Color::where('product_id', $product->product_id)->get();
        
        $category1 = Category::all();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        $product12 = Product::all();
        $img1 = [];
        // Lặp qua từng sản phẩm và lấy các ảnh và màu tương ứng
        foreach ($product12 as $prod) {
            $img1[$prod->product_id] = Img::where('product_id', $prod->product_id)->get();
        } 
       return view('clients.chitietsanpham', $this->data,compact('category1','brand1','brand2','product','img2','color1','product12','img1'));
    }
    
}

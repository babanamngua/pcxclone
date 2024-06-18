<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\Order_items;



class HomeController extends Controller
{
    public $data =[];
    public function index()
    {   
        $this->data['title'] = 'trang sản phẩm';
        $product1 = Product::all();
        $img1 = [];
        $color1 = [];
        $cartCount = 0;
        

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        // Lặp qua từng sản phẩm và lấy các ảnh và màu tương ứng
        foreach ($product1 as $product) {
            // $img1[$product->product_id] = Img::where('product_id', $product->product_id)->get();
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        } 
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        return view('clients.home',$this->data,compact(
            'category1',
            'category2',
            'brand1',
            'brand2',
            'product1',
            'img1',
            'color1',
            'cartCount'));
    }
    public function detail($id)
    {   
        $product = Product::findOrFail($id);
        $this->data['title'] = $product->product_name;
        // $img2 = Img::where('product_id', $product->product_id)->first();
        $color1 = Color::where('product_id', $product->product_id)->get();
        
        $category1 = Category::all();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        $product12 = Product::all();
        $img = [];
        $color = [];
        $img1 = [];
        $color1 = [];
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
         
            $img[$product->product_id] = Img::where('product_id', $product->product_id)->get();
            $color[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        
        // Lặp qua từng sản phẩm và lấy các ảnh và màu tương ứng
        foreach ($product12 as $prod) {
            $img1[$prod->product_id] = Img::where('product_id', $prod->product_id)->get();
            $color1[$prod->product_id] = Color::where('product_id', $prod->product_id)->get();
        } 
       
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
       return view('clients.chitietsanpham', $this->data,compact(
        'product',
        'product12',
        'color1',
        'img1',
        'color',
        'img',
        'cartCount',
        'category1',
        'category2',
        'brand1',
        'brand2'
    ));
    }
    public function tintuc()
    {
        $this->data['title'] = 'trang tin tức';
        $cartCount = 0;
        

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        return view('clients.listtintuc',$this->data,compact(
            'cartCount',
            'category1',
            'category2',
            'brand1',
            'brand2'
        ));
    }
    public function lienhe()
    {
        $this->data['title'] = 'trang liên hệ';
        $cartCount = 0;
        

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        return view('clients.lienhe',$this->data,compact(
            'cartCount',
            'category1',
            'category2',
            'brand1',
            'brand2'
        ));
    }
    public function category($categoryName, $brandName)
    {
    $this->data['title'] = $categoryName . ' ' . $brandName;
     // Lấy thông tin category
     $category = Category::where('category_name', $categoryName)->first();
    
    // Lấy thông tin brand có tên trùng với $brandName và có category_id không null
    $brands = Brand::where('brand_name', $brandName)->whereNull('category_id')->first();
    
    // Kiểm tra nếu không tìm thấy category hoặc brand thì trả về 404
    if (!$category || !$brands) {
        return abort(404);
    }

    // Lấy danh sách các sản phẩm chỉ khi category_id và brand_id trùng khớp
    $products = Product::where('category_id', $category->category_id)
                       ->where('brand_id', $brands->brand_id)
                       ->get();
     //dd($products); // Debug: Xem xem products có dữ liệu không
    // Các thông tin khác
    $color1 = [];
    $cartCount = 0;
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
        $cartCount = count($cartItems);
    } else {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
    }

    foreach ($products as $product) {
        $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
    }
   
    $category1 = Category::whereNotNull('component_id')->get();
    $category2 = Category::whereNull('component_id')->get();
    $brand1 = Brand::whereNotNull('category_id')->get();
    $brand2 = Brand::whereNull('category_id')->get();

    // return view('clients.listsanpham1', $this->data, compact('category', 'brands', 'products', 'color1', 'cartCount', 'category1', 'category2', 'brand1', 'brand2'));
    return view('clients.listsanpham1',$this->data,[
        'category' => $category,
        'brands' => $brands,
        'products' => $products,
        'color1' => $color1,
        'cartCount' => $cartCount,
        'category1' => $category1,
        'category2'=> $category2,
        'brand1' => $brand1,
        'brand2'=> $brand2
    ]);
}
public function search(Request $request)
    {
        
        $query = $request->input('query');
        $products = Product::where('product_name', 'LIKE', "%{$query}%")->get();
        return response()->json($products);
    }


    public function searchBlade(Request $request)
    {
        $this->data['title'] = 'trang tìm kiếm';
        $cartCount = 0;
        

        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
        $searchTerm = $request->input('q');
        $products = Product::where('product_name', 'LIKE', '%' . $searchTerm . '%')->get();
        foreach ($products as $product) {
            $color1[$product->product_id] = Color::where('product_id', $product->product_id)->get();
        }

        return view('clients.search-product',$this->data, compact('products','color1', 'searchTerm','cartCount','category1','category2','brand1','brand2'));
    }
}
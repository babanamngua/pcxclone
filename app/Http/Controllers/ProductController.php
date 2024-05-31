<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use App\Models\Img;
// use App\Models\Color;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public $data =[];

    public function index()
    {
        $this->data['title'] = 'trang sản phẩm';
        // $img1 = Img::all();
        // $color1 = Color::all();
        $category1 = Category::all();
        $brand1 = Brand::all();
        $product1 = Product::all();
        return view('admin.product.list_sanpham',$this->data,compact('category1','brand1','product1'));
    }
    public function create()
    {        
        $this->data['title'] = 'trang tạo sản phẩm';
        // $img1 = Img::all();
        // $color1 = Color::all();
        $category1 = Category::all();
        $brand1 = Brand::all();
        $product1 = Product::all();
        return view('admin.product.add_sanpham',$this->data,compact('category1','brand1','product1'));
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'trang sản phẩm';

       $request->validate([
            'product_name'=> 'required|string|max:255',
            'category_id' => 'nullable|exists:category,category_id',
            'brand_id' => 'nullable|exists:brand,brand_id',
            'price' =>'required|decimal:2',
            'description'=>'nullable',
            'quantity'=>'required',
            ]);
        $product = new Product();
        // $img = new Img();
        // $color = new Color();
        // url_img cho table img
        // if ($request->hasFile('url_img')) {
        //     $image = $request->file('url_img');
        //     $name = date('d-m-y-H-i').'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/storage/product'); // Thư mục đích
        //     $image->move($destinationPath, $name);
        //     $img->url_img = $name;
        // }

        //  if ($request->hasFile('url_img')) {
        //     foreach ($request->file('url_img') as $image) {
        //         $path = $image->store('url_img', 'public');
        //         Img::create([
        //             'url_img' => $path
        //         ]);
        //     }
        // } 

        $product->product_name = $request->input('product_name');  
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id'); 
        $product->price = $request->input('price'); 
        $product->description = $request->input('description'); 
        $product->quantity = $request->input('quantity');
        $product->save();
 
        
        return redirect()->route('product.index',$this->data)->with('success', 'Product created successfully.');
        // $color = new Color();
        // $img = new Img();
        // $product = Product::create($request->only([
        //     'product_name', 'category_id', 'brand_id', 'price', 'description', 'quantity'
        // ]));
// $category->brand_id = $request->input('brand_id'); 


        // if ($request->hasFile('url_img')) {
        //     foreach ($request->file('url_img') as $image) {
        //         $path = $image->store('url_img', 'public');
        //         Img::create([
        //             'product_id' => $product->id,
        //             'url_img' => $path
        //         ]);
        //     }
        // }

        // foreach ($request->img as $img) {
        //     if ($request->hasFile('url_name')) {
        //         $image = $request->file('url_name');
        //         $name = date('d-m-y-H-i').'.'.$image->getClientOriginalExtension();
        //         $destinationPath = public_path('/storage/product'); // Thư mục đích
        //         $image->move($destinationPath, $name);
        //         $img->url_name = $name;
        //     }
        //     $img->product_id = $request->input('product_id'); 
        //     $img->save();
            // Img::create([
            // 'product_id' => $product->product_id,
            // ]);
        // }

        // foreach ($request->color as $color) {
        //     Color::create([
        //         'product_id' => $product->product_id,
        //         'color_name' => $color
        //     ]);
        // }
    }
    public function edit($id)
    {
    $this->data['title'] = 'trang sửa sản phẩm';
    $category1 = Category::all();
    $brand1 = Brand::all();
    $product = Product::findOrFail($id);
     return view('admin.product.edit_sanpham',$this->data, compact('product','brand1','category1'));
  
    }
    public function update(Request $request, $id)
    { 
        $this->data['title'] = 'Trang sản phẩm';
        $request->validate([
            'product_name'=> 'required|string|max:255',
            'category_id' => 'nullable|exists:category,category_id',
            'brand_id' => 'nullable|exists:brand,brand_id',
            'price' =>'required|decimal:2',
            'description'=>'nullable',
            'quantity'=>'required',
            ]);
        $product = Product::findOrFail($id);
        // dd($brand);
       
        $product->product_name = $request->input('product_name');  
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id'); 
        $product->price = $request->input('price'); 
        $product->description = $request->input('description'); 
        $product->quantity = $request->input('quantity');
        $product->save();
        return redirect()->route('product.index',$this->data)->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
   {
    $this->data['title'] = 'trang sản phẩm';
       $product = Product::findOrFail($id);
       $product->delete();
       return redirect()->route('product.index')->with('success', 'sản phẩm đã xóa thành công.');
   }

}

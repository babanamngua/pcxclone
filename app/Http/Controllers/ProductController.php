<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Img;
use App\Models\Color;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Quantity;
use App\Models\Capacity;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $data =[];

    public function index()
    {
        $this->data['title'] = 'trang sản phẩm';
        // $img1 = Img::all();
        // $color1 = Color::all();
        $category1 = Category::all();
        $brand1 = Brand::whereNull('category_id')->get();
        $product1 = Product::all();
        return view('admin.product.list_sanpham',$this->data,compact('category1','brand1','product1'));
    }
    public function create()
    {        
        $this->data['title'] = 'trang tạo sản phẩm';
        // $img1 = Img::all();
        // $color1 = Color::all();
        $category1 = Category::all();
        $brand1 = Brand::whereNull('category_id')->get();
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
            'price' =>'required|numeric',
            'description'=>'nullable',
            // 'url_name' => 'nullable|image|file',
            'url_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        $product = new Product();
        $product->product_name = $request->input('product_name');  
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id'); 
        $product->price = $request->input('price'); 
        $product->description = $request->input('description'); 
        $productFolder = public_path('storage/products/' . $product->product_name.'/'.'img');
        if (!File::exists($productFolder)) 
            {
                File::makeDirectory($productFolder, 0755, true);
            }
            if ($request->hasFile('url_name')) {
                $image = $request->file('url_name');
                $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
                $destinationPath =public_path('storage/products/' . $product->product_name); // Corrected path to save image in img folder
                $image->move($destinationPath, $name);
                $product->url_name = $name; // Save relative path in database
            }
        $product->save();
        return redirect()->route('product.index',$this->data)->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
    $this->data['title'] = 'trang sửa sản phẩm';
    $category1 = Category::all();
    $brand1 = Brand::whereNull('category_id')->get();
    $product = Product::findOrFail($id);
     return view('admin.product.edit_sanpham',$this->data, compact('product','brand1','category1'));
  
    }

public function update(Request $request, $id)
{
    $this->data['title'] = 'Trang sản phẩm';

    $request->validate([
        'product_name' => 'required|string|max:255',
        'category_id' => 'nullable|exists:category,category_id',
        'brand_id' => 'nullable|exists:brand,brand_id',
        'price' => 'required|numeric',
        'description' => 'nullable',
        // 'url_name' => 'nullable|image|file',
        'url_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
    ]);

    $product = Product::findOrFail($id);
    $oldProductName = $product->product_name; // Lưu tên cũ của sản phẩm

    // Cập nhật thông tin sản phẩm
    $product->product_name = $request->input('product_name');
    $product->brand_id = $request->input('brand_id');
    $product->category_id = $request->input('category_id');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    $newProductFolder = public_path('storage/products/' . $product->product_name . '/' . 'img');
    $oldProductFolder = public_path('storage/products/' . $oldProductName . '/' . 'img');

    // Đổi tên thư mục nếu tên sản phẩm đã thay đổi
    if ($oldProductName !== $product->product_name) {
        if (File::exists($oldProductFolder)) {
            File::moveDirectory(public_path('storage/products/' . $oldProductName), public_path('storage/products/' . $product->product_name));
        }
    }

    // Tạo thư mục nếu chưa tồn tại
    if (!File::exists($newProductFolder)) {
        File::makeDirectory($newProductFolder, 0755, true);
    }

    // Xử lý ảnh
    if ($request->hasFile('url_name')) {
        if ($product->url_name && file_exists(public_path('storage/products/'. $product->product_name . '/' . $product->url_name))) { unlink(public_path('storage/products/'. $product->product_name . '/' . $product->url_name));
            // if ($brand->image && file_exists('storage/img/brand/' . $brand->image)) { unlink('storage/img/brand/' . $brand->image);
        }
        $image = $request->file('url_name');
        $name = date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/products/' . $product->product_name); // Thư mục đích
        $image->move($destinationPath, $name);
        $product->url_name = $name;
    }

    $product->save();
    return redirect()->route('product.index', $this->data)->with('success', 'Product updated successfully.');
}

    public function destroy($id)
   {
    $this->data['title'] = 'trang sản phẩm';
       $product = Product::findOrFail($id);
       $images = Img::where('product_id', $id)->get();
       $colors = Color::where('product_id', $id)->get();
       $quantitys = Quantity::where('product_id', $id)->get();

       if($images){
       foreach ($images as $image) {
           // Đường dẫn tới tệp ảnh
           $imagePath = public_path('storage/products/' . $product->product_name .'/'.'img'.'/'. $image->url_img);
           if (File::exists($imagePath)) {
               File::delete($imagePath);
           }
           // Xóa bản ghi ảnh từ cơ sở dữ liệu
           $image->delete();
       }}
        if($quantitys){
        foreach ($quantitys as $quantity) {
            // Xóa bản ghi màu từ cơ sở dữ liệu
            $quantity->delete();
        }}
       // Xóa màu liên quan
       if($colors){
       foreach ($colors as $color) {
           // Xóa bản ghi màu từ cơ sở dữ liệu
           $color->delete();
       }}
       $productFolder = public_path('storage/products/' . $product->product_name);          
            // Kiểm tra và xóa thư mục nếu tồn tại
            if (File::exists($productFolder)) {
                File::deleteDirectory($productFolder);
            }
            $product->delete();
       return redirect()->route('product.index')->with('success', 'sản phẩm đã xóa thành công.');
   }
   

}

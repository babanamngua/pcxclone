<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Component;

class CategoryController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = 'trang loại sản phẩm';
        // $category = Category::with('children')->whereNull('parent_id')->get();
        $category = Category::with('brand','component')->get();
        return view('admin.category.list_loaisp',$this->data, compact('category'));
    }
    public function create()
    {
        $this->data['title'] = 'trang thêm thể loại';
        $brand = Brand::all();
        $component = Component::all();
        return view('admin.category.add_loaisp',$this->data,compact('brand', 'component'));
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'trang loại sản phẩm';

        $request->validate([
            'category_name' => 'required|string|max:255',
            'url_name'=>'nullable|image|file',
            'brand_id' => 'nullable|exists:brand,brand_id',
            'component_id' => 'nullable|exists:component,component_id',

        ]);
        $category = new Category();
        // Lưu các thuộc tính khác
        if ($request->hasFile('url_name')) {
            $image = $request->file('url_name');
            $name = date('d-m-y-H-i').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/category'); // Thư mục đích
            $image->move($destinationPath, $name);
            $category->url_name = $name;
        }
        $category->category_name = $request->input('category_name'); 
        $category->brand_id = $request->input('brand_id'); 
        $category->component_id = $request->input('component_id'); 
        $category->save();
        return redirect()->route('category.index',$this->data)->with('success', 'Category added successfully.');
    }
    public function edit(Category $category)
    {
    $this->data['title'] = 'trang sửa thể loại';
    $brand = Brand::all();
    $component = Component::all();
     return view('admin.category.edit_loaisp',$this->data, compact('category', 'brand', 'component'));
  
    }
    public function update(Request $request, Category $category)
    { 
    $this->data['title'] = 'trang loại sản phẩm';
    $request->validate([
        'category_name' => 'required|string|max:255',
        'url_name'=>'nullable|image|file',
        'brand_id' => 'nullable|exists:brand,brand_id',
        'component_id' => 'nullable|exists:component,component_id',
    ]);
    // dd($brand);
    if ($request->hasFile('url_name')) {
        // Xóa ảnh cũ nếu có
        if ($category->url_name && file_exists(public_path('storage/category/' . $category->url_name))) { unlink(public_path('storage/category/' . $category->url_name));
            // if ($brand->image && file_exists('storage/img/block/thuonghieu/' . $brand->image)) { unlink('storage/img/block/thuonghieu/' . $brand->image);
        }
        // thêm mới
        $image = $request->file('url_name');
        $name =$category->category_id .'-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/category'); // Thư mục đích
        $image->move($destinationPath, $name);
        $category->url_name = $name; // Cập nhật tên tệp vào cơ sở dữ liệu
    }
    $category->category_name = $request->input('category_name'); 
    $category->brand_id = $request->input('brand_id'); 
    $category->component_id = $request->input('component_id'); 

    $category->save();
    return redirect()->route('category.index',$this->data)->with('success', 'Category updated successfully.');
    }
    public function destroy(Category $category)
    {
     $this->data['title'] = 'trang nhà sản xuất';
        // Xóa ảnh nếu có
        if ($category->url_name && file_exists(public_path('storage/category/' . $category->url_namme))) { 
            unlink(public_path('storage/category/' . $category->url_name));
        }
        $category->delete();
    
        return redirect()->route('category.index',$this->data)->with('success', 'Category deleted successfully.');
    }

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;


class BrandController extends Controller
{
    public $data =[];
    public function index()
    {        
        $brand1 = Brand::whereNotNull('category_id')->get();
        $category1 = Category::all();
        $this->data['title'] = 'trang nhà sản xuất';
        return view('admin.brand.list_nhasanxuat',$this->data,compact('brand1','category1'));
    }
    public function create()
    {        
        $this->data['title'] = 'trang thêm nhà sản xuất';
        $brand10 = Brand::whereNull('category_id')->get();
        $category = Category::all();
        return view('admin.brand.add_nhasanxuat',$this->data,compact('category','brand10'));
    }
    public function store(Request $request)
    {        
        $this->data['title'] = 'trang nhà sản xuất';
        $request->validate([
            'category_id'=> 'nullable|exists:category,category_id',
            'brand_name'=>'required|string|max:255',
            'url_name'=>'nullable|image|file',
        ]);

        $brand = new Brand();
        // Lưu các thuộc tính khác
        if ($request->hasFile('url_name')) {
            $image = $request->file('url_name');
            $name = date('d-m-y-H-i-s').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/brand'); // Thư mục đích
            $image->move($destinationPath, $name);
            $brand->url_name = $name;
        }

        
        $brand->brand_name = $request->input('brand_name'); // Cung cấp giá trị cho brand_name
        $brand->category_id = $request->input('category_id');
        $brand->save();
        return redirect()->route('brand.index',$this->data)->with('success', 'Nhà sản xuất đã thêm thành công.');
    }
    public function update(Request $request, $id)
    { 
    $this->data['title'] = 'trang nhà sản xuất';
    $request->validate([
        'category_id'=> 'nullable|exists:category,category_id',
        'brand_name' => 'required|string|max:255',
        'url_name' => 'nullable|image|file',
    ]);
    $brand = Brand::findOrFail($id);
    // dd($brand);
    if ($request->hasFile('url_name')) {
        // Xóa ảnh cũ nếu có
        if ($brand->url_name && file_exists(public_path('storage/brand/' . $brand->url_name))) { unlink(public_path('storage/brand/' . $brand->url_name));
            // if ($brand->image && file_exists('storage/img/brand/' . $brand->image)) { unlink('storage/img/brand/' . $brand->image);
        }
        // thêm mới
        $image = $request->file('url_name');
        $name =$brand->brand_id .'-' . date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/brand'); // Thư mục đích
        $image->move($destinationPath, $name);
        $brand->url_name = $name; // Cập nhật tên tệp vào cơ sở dữ liệu
    }
    $brand->brand_name = $request->input('brand_name');
    $brand->category_id = $request->input('category_id');
    $brand->save();
    return redirect()->route('brand.index',$this->data)->with('success', 'Nhà sản xuất đã cập nhật thành công.'); 
    }
   public function edit($id)
   {
    $this->data['title'] = 'trang sửa nhà sản xuất';
    $brand = Brand::findOrFail($id);
    $brand10 = Brand::whereNull('category_id')->get();
    $category = Category::all();
    return view('admin.brand.edit_nhasanxuat',$this->data,compact('brand','category','brand10'));
 
   }
   public function destroy($id)
   {
    $this->data['title'] = 'trang nhà sản xuất';
       $brand = Brand::findOrFail($id);
       // Xóa ảnh nếu có
       if ($brand->url_name && file_exists(public_path('storage/brand/' . $brand->url_name)))
        { unlink(public_path('storage/brand/' . $brand->url_name));}  
       $brand->delete();
       return redirect()->route('brand.index')->with('success', 'Nhà sản xuất đã xóa thành công.');
   }

// /////////////////////////////////////////////////////////////////////////////////////////////////////////
public function typeindex()
{        
    $brand1 = Brand::whereNull('category_id')->get();
    $this->data['title'] = 'trang nhà sản xuất';
    return view('admin.type.list_type',$this->data,compact('brand1'));
}
public function  typecreate()
{        
    $this->data['title'] = 'trang thêm nhà sản xuất';
    return view('admin.type.add_type',$this->data);
}
public function  typestore(Request $request)
{        
    $this->data['title'] = 'trang nhà sản xuất';
    $request->validate([
        'brand_name'=>'required|string|max:255',
        'url_name'=>'nullable|image|file',
        // 'url_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
    ]);

    $brand = new Brand();
    // Lưu các thuộc tính khác
    if ($request->hasFile('url_name')) {
        $image = $request->file('url_name');
        $name = date('d-m-y-H-i-s').'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('storage/block/thuonghieu'); // Thư mục đích
        $image->move($destinationPath, $name);
        $brand->url_name = $name;
    }

    
    $brand->brand_name = $request->input('brand_name'); // Cung cấp giá trị cho brand_name
    $brand->save();
    return redirect()->route('type.index',$this->data)->with('success', 'Nhà sản xuất đã thêm thành công.');
}
public function  typeupdate(Request $request, $id)
{ 
$this->data['title'] = 'trang nhà sản xuất';
$request->validate([
    'brand_name' => 'required|string|max:255',
    'url_name' => 'nullable|image|file',
    // 'url_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
]);
$brand = Brand::findOrFail($id);
// dd($brand);
if ($request->hasFile('url_name')) {
    // Xóa ảnh cũ nếu có
    if ($brand->url_name && file_exists(public_path('storage/block/thuonghieu/' . $brand->url_name))) 
    {
         unlink(public_path('storage/block/thuonghieu/' . $brand->url_name));
    }
    // thêm mới
    $image = $request->file('url_name');
    $name =$brand->brand_id .'-' . date('d-m-y-H-i-s') . '.' . $image->getClientOriginalExtension();
    $destinationPath = public_path('storage/block/thuonghieu'); // Thư mục đích
    $image->move($destinationPath, $name);
    $brand->url_name = $name; // Cập nhật tên tệp vào cơ sở dữ liệu
}
$brand->brand_name = $request->input('brand_name');
$brand->save();
return redirect()->route('type.index',$this->data)->with('success', 'Nhà sản xuất đã cập nhật thành công.'); 
}
public function  typeedit($id)
{
$this->data['title'] = 'trang sửa nhà sản xuất';
$brand = Brand::findOrFail($id);
return view('admin.type.edit_type',$this->data,compact('brand'));

}
public function  typedestroy($id)
{
$this->data['title'] = 'trang nhà sản xuất';
   $brand = Brand::findOrFail($id);
   // Xóa ảnh nếu có
   if ($brand->url_name && file_exists(public_path('storage/block/thuonghieu/' . $brand->url_name)))
    { unlink(public_path('storage/block/thuonghieu/' . $brand->url_name));}
   $brand->delete();
   return redirect()->route('type.index')->with('success', 'Nhà sản xuất đã xóa thành công.');
}
}

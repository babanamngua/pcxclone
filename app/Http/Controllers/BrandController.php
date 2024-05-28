<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public $data =[];
    public function index()
    {        
        $brand = Brand::all();
        $this->data['title'] = 'trang nhà sản xuất';
        return view('admin.brand.list_nhasanxuat',$this->data,compact('brand'));
    }
    public function create()
    {        
        $this->data['title'] = 'trang thêm nhà sản xuất';
        return view('admin.brand.add_nhasanxuat',$this->data);
    }
    public function store(Request $request)
    {        
        $this->data['title'] = 'trang nhà sản xuất';
        $data = $request->validate([
            'brand_name'=>'required|string|max:255',
            'url_name'=>'required|image|file',
        ]);

        $brand = new Brand();
        // Lưu các thuộc tính khác
        if ($request->hasFile('url_name')) {
            $image = $request->file('url_name');
            $name = date('d-m-y-H-i').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/brand'); // Thư mục đích
            $image->move($destinationPath, $name);
            $brand->url_name = $name;
        }

        
        $brand->brand_name = $request->input('brand_name'); // Cung cấp giá trị cho brand_name
        $brand->save();
        return redirect()->route('brand.index',$this->data)->with('success', 'Nhà sản xuất đã thêm thành công.');
    }
    public function update(Request $request, $id)
    { 
    $this->data['title'] = 'trang nhà sản xuất';
    $request->validate([
        'brand_name' => 'required|string|max:255',
        'image' => 'nullable|image|file',
    ]);
    $brand = Brand::findOrFail($id);
    // dd($brand);
    if ($request->hasFile('url_name')) {
        // Xóa ảnh cũ nếu có
        if ($brand->url_name && file_exists(public_path('storage/brand/' . $brand->url_namme))) { unlink(public_path('storage/brand/' . $brand->url_name));
            // if ($brand->image && file_exists('storage/img/brand/' . $brand->image)) { unlink('storage/img/brand/' . $brand->image);
        }
        // thêm mới
        $image = $request->file('url_name');
        $name =$brand->brand_id .'-' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('storage/brand'); // Thư mục đích
        $image->move($destinationPath, $name);
        $brand->url_name = $name; // Cập nhật tên tệp vào cơ sở dữ liệu
    }
    $brand->brand_name = $request->input('brand_name');
    $brand->save();
    return redirect()->route('brand.index',$this->data)->with('success', 'Nhà sản xuất đã cập nhật thành công.'); 
    }
   public function edit($id)
   {
    $this->data['title'] = 'trang sửa nhà sản xuất';
    $brand = Brand::findOrFail($id);
    return view('admin.brand.edit_nhasanxuat',$this->data,compact('brand'));
 
   }
   public function destroy($id)
   {
    $this->data['title'] = 'trang nhà sản xuất';
       $brand = Brand::findOrFail($id);
       // Xóa ảnh nếu có
       if ($brand->url_name && file_exists(public_path('storage/brand/' . $brand->url_namme)))
        { unlink(public_path('storage/brand/' . $brand->url_name));}
   
       $brand->delete();
   
       return redirect()->route('brand.index')->with('success', 'Nhà sản xuất đã xóa thành công.');
   }

}

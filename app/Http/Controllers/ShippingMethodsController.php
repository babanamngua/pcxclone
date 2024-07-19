<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingMethods;

class ShippingMethodsController extends Controller
{
    public $data =[];
    public function index()
 {        
     $shippingmethods = ShippingMethods::all();
     $this->data['title'] = 'Trang Phương thức vận chuyển';
     return view('admin.shippingmethods.list_shippingmethods',$this->data,compact('shippingmethods'));
 }
 public function create()
 {
     $this->data['title'] = 'Trang thêm phương thức vận chuyện';
     return view('admin.shippingmethods.add_shippingmethods',$this->data);
 }
    public function store(Request $request)
    {
        $this->data['title'] = 'Trang phương thức vận chuyện';
        $data = $request->validate([
        'method_name' => 'required|string|max:100',
        ]);
        ShippingMethods::create($data);
        return redirect()->route('shippingmethods.index',$this->data)->with('success', 'Phương thức vận chuyện thêm thành công.');
    }
    public function edit(shippingmethods $shippingmethods)
    {
        $this->data['title'] = 'Trang sửa phương thức vận chuyện';
        return view('admin.shippingmethods.edit_shippingmethods',$this->data,compact('shippingmethods'));
    }
    public function update(Request $request, shippingmethods $shippingmethods)
    {
        $this->data['title'] = 'Trang phương thức vận chuyện';
        $data = $request->validate([
        'method_name' => 'required|string|max:100', 
        ]);
        $shippingmethods->update($data);
        return redirect()->route('shippingmethods.index',$this->data)->with('success', 'Phương thức vận chuyện đã cập nhật thành công.');
    }   
    public function destroy(ShippingMethods $ShippingMethods)
    {
        $ShippingMethods->delete();
        return redirect()->route('shippingmethods.index',$this->data)->with('success', 'Phương thức vận chuyện đã xóa thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayMethods;

class PayMethodsController extends Controller
{
    public $data =[];
    public function index()
 {        
     $paymethods = PayMethods::all();
     $this->data['title'] = 'Trang Phương thức thanh toán';
     return view('admin.paymethods.list_paymethods',$this->data,compact('paymethods'));
 }
 public function create()
 {
     $this->data['title'] = 'Trang thêm phương thức thanh toán';
     return view('admin.paymethods.add_paymethods',$this->data);
 }
    public function store(Request $request)
    {
        $this->data['title'] = 'Trang phương thức thanh toán';
        $data = $request->validate([
        'method_name' => 'required|string|max:100',
        ]);
        PayMethods::create($data);
        return redirect()->route('paymethods.index',$this->data)->with('success', 'Phương thức thanh toán thêm thành công.');
    }
    public function edit(paymethods $paymethods)
    {
        $this->data['title'] = 'Trang sửa phương thức thanh toán';
        return view('admin.paymethods.edit_paymethods',$this->data,compact('paymethods'));
    }
    public function update(Request $request, paymethods $paymethods)
    {
        $this->data['title'] = 'Trang phương thức thanh toán';
        $data = $request->validate([
        'method_name' => 'required|string|max:100', 
        ]);
        $paymethods->update($data);
        return redirect()->route('paymethods.index',$this->data)->with('success', 'Phương thức thanh toán đã cập nhật thành công.');
    }   
    public function destroy(paymethods $paymethods)
    {
        $paymethods->delete();
        return redirect()->route('paymethods.index',$this->data)->with('success', 'Phương thức thanh to đã xóa thành công.');
    }
}

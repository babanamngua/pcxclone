<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;

class ComponentController extends Controller
{
    public $data =[];
       public function index()
    {        
        $component = Component::all();
        $this->data['title'] = 'trang linh kiện';
        return view('admin.component.list_linhkien',$this->data,compact('component'));
    }
    public function create()
    {
        $this->data['title'] = 'trang thêm linh kiện';
        return view('admin.component.add_linhkien',$this->data);
    }
    public function store(Request $request)
    {
        $this->data['title'] = 'trang linh kiện';
        $data = $request->validate([
        'component_name' => 'required|string|max:255',
        ]);
        Component::create($data);
        return redirect()->route('component.index',$this->data)->with('success', 'Linh kiện thêm thành công.');
    }
    public function edit(Component $component)
    {
        $this->data['title'] = 'trang sửa nhà sản xuất';
        return view('admin.component.edit_linhkien',$this->data,compact('component'));
    }
    public function update(Request $request, Component $component)
    {
        
        $this->data['title'] = 'trang linh kiện';
        $data = $request->validate([
        'component_name' => 'required|string|max:255', 
        ]);
        $component->update($data);
        return redirect()->route('component.index',$this->data)->with('success', 'Linh kiện đã cập nhật thành công.');
    
    }
    public function destroy(Component $component)
    {
        $component->delete();
        return redirect()->route('component.index',$this->data)->with('success', 'Linh kiện đã xóa thành công.');
    }
}

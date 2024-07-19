<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Color;

class QuantityController extends Controller
{
    public $data = [];
    
    public function add(Request $request)
    {
        $this->data['title'] = 'Trang thêm số lượng sản phẩm';
        $quantity = new Quantity();

        $request->validate([
            'product_id' => 'required|integer|exists:product,product_id',
            'color_id' => 'nullable|integer|exists:color,color_id',
            'quantity_product' => 'required|integer|min:0',
            'capacity' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:100',
            'price' =>'required|numeric',
        ]);
        
        $quantity->product_id = $request->input('product_id');
        $quantity->color_id = $request->input('color_id');
        $quantity->quantity_product = $request->input('quantity_product');
        $quantity->capacity = $request->input('capacity');
        $quantity->size = $request->input('size');
        $quantity->price = $request->input('price');
        $quantity->save();
        
        return redirect()->back()->with('status', 'Thêm số lượng sản phẩm thành công.');
    }
    
    public function upload($id)
    {
        $this->data['title'] = 'Trang thêm số lượng sản phẩm';
        $product = Product::findOrFail($id);
        // $quantities = Quantity::where('product_id', $id)->get();
        $quantities = Quantity::with(['product', 'color'])->where('product_id', $id)->get(); // Eager load relationships
        $colors = Color::where('product_id', $id)->get();
        
        return view('admin.quantity.add_quantity', $this->data, compact('quantities', 'product', 'colors'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity_product' => 'required|integer|min:0',
            'capacity' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:100',
            'price' =>'required|numeric',
        ]);
        $quantity = Quantity::findOrFail($id);
        $quantity->quantity_product = $request->input('quantity_product');
        $quantity->capacity = $request->input('capacity');
        $quantity->size = $request->input('size');
        $quantity->price = $request->input('price');
        $quantity->save();

        return redirect()->back()->with('status', 'Quantity updated successfully.');
    }
    public function destroy($id)
    {
        $quantity = Quantity::findOrFail($id);
        $quantity->delete();
        
        return redirect()->back()->with('status', 'Xóa số lượng thành công.');
    }
}

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
            'quantity_product' => 'required|integer|min:1',
        ]);
        
        $quantity->product_id = $request->input('product_id');
        $quantity->color_id = $request->input('color_id');
        $quantity->quantity_product = $request->input('quantity_product');
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
    
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $this->data['title'] = 'Trang thêm số lượng sản phẩm';
        $request->validate([
            'color_id.*' => 'nullable|integer|exists:color,color_id',
            'quantity_product.*' => 'required|integer|min:1'
        ]);
        
        $quantitiesData = [];
        foreach ($request->color_id as $index => $colorId)
        {
            $quantitiesData[] = [
                'product_id' => $product->product_id,
                'color_id' => $colorId,
                'quantity_product' => $request->quantity_product[$index]
            ];
        }

        foreach ($quantitiesData as $quantity) {
            Quantity::create($quantity);
        }

        return redirect()->back()->with('status', 'Thêm số lượng vào sản phẩm thành công.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity_product' => 'required|integer|min:0'
        ]);

        $quantity = Quantity::findOrFail($id);
        $quantity->quantity_product = $request->input('quantity_product');
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

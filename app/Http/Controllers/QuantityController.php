<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\Color;
use App\Models\Discount;

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
        $discount = Discount::where('id',$quantity->discount_id)->get();
        $quantity->delete();
        if($discount){
            foreach ($discount as $dis) {               
                $dis->delete();
            }          
        }
        return redirect()->back()->with('status', 'Xóa số lượng thành công.');
    }
    public function updateDiscountProductview($id)
    {
        $quantity = Quantity::findOrFail($id);
        $product = Product::where('product_id',$quantity->product_id)->get();
        $color = Color::where('color_id',$quantity->color_id)->get();
        $discount = Discount::where('id',$quantity->discount_id)->get();
        $this->data['title'] = 'Trang giảm giá sản phẩm';
        return view('admin.quantity.add_or_edit_discountproduct', $this->data,compact('quantity', 'product','color','discount'));
    }
    public function updateDiscountProduct(Request $request,$id)
    {
        $quantity = Quantity::findOrFail($id);
        $request->validate([
            'description' => 'nullable',
            'value' => 'required|integer|max:100',
            'start_date' => 'nullable',
            'end_date' =>'nullable',
        ]);

        $discount = new Discount();
        $discount->description = $request->input('description');
        $discount->value = $request->input('value');
        $discount->start_date = $request->input('start_date');
        $discount->end_date= $request->input('end_date');
        $discount->save();
        $quantity->discount_id =  $discount->id;
        $quantity->save();

        return redirect()->back()->with('success', 'Thành công.');
    }
    public function updateDiscountProductdestroy($id)
    {
        $discount = Discount::findOrFail($id);
        $quantity = Quantity::where('discount_id',$id)->get();
        if($quantity){
            foreach ($quantity as $quanti) {
                $quanti->discount_id = null;
                $quanti->save();
            }
          
        }
         $discount->delete(); 
         
        return redirect()->back()->with('status', 'Xóa thành công.');
    }
}

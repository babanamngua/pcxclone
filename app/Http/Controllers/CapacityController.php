<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Capacity;


class CapacityController extends Controller
{
    public $data = [];
    
    public function add(Request $request)
    {
        $this->data['title'] = 'Trang thêm dung lượng sản phẩm';
        $capacities = new Capacity();

        $request->validate([
            'product_id' => 'required|integer|exists:product,product_id',          
            'capacity_quantity' => 'required',
        ]);
        
        $capacities->product_id = $request->input('product_id');
        $capacities->capacity_quantity = $request->input('capacity_quantity');
        $capacities->save();
        
        return redirect()->back()->with('status', 'Thêm dung lượng sản phẩm thành công.');
    }
    
    public function upload($id)
    {
        $this->data['title'] = 'Trang thêm số lượng sản phẩm';
        $product = Product::findOrFail($id);
        // $quantities = Quantity::where('product_id', $id)->get();
        $capacities = Capacity::where('product_id', $id)->get(); // Eager load relationships
        
        return view('admin.capacity.add_capacity', $this->data, compact('capacities','product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'capacity_quantity' => 'required',
        ]);
        $capacities = Capacity::findOrFail($id);
        $capacities->capacity_quantity = $request->input('capacity_quantity');
        $capacities->save();

        return redirect()->back()->with('status', 'Cập nhật dung lượng thành công.');
    }
    public function destroy($id)
    {
        $capacities = Capacity::findOrFail($id);
        $capacities->delete();
        
        return redirect()->back()->with('status', 'Xóa dung lượng thành công.');
    }
}

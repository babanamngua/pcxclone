<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Order_items;
use App\Models\Quantity;
use App\Models\shipping;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ShippingMethods;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = "trang đơn hàng";
        $orders = Orders::all();
        $shipping_methods= ShippingMethods::all();
        
        // Create an associative array to store the order item counts
        $order_item_Counts = [];
        foreach ($orders as $order) {
            $order_item_Counts[$order->order_id] = Order_items::where('order_id', $order->order_id)->count();
        }
        return view('admin.orders.list_orders', $this->data, compact('orders', 'order_item_Counts','shipping_methods'));
    }
    public function edit($id)
    {
        $this->data['title'] = "trang chỉnh sửa đơn hàng";
        $order = Orders::findOrFail($id);
        $statusOptions = ['pending','confirmed','delivering','delivered','completed','cancelled','refunded','failed'];
        return view('admin.orders.edit_orders', $this->data,compact('order','statusOptions'));
    }

    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('status', 'Order updated successfully!');
    }

    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order_items = Order_items::where('order_id', $order->order_id)->get();
    
        if ($order_items) {
            foreach ($order_items as $order_item) {
                // Find the corresponding quantity entry
                $quantity = Quantity::where('product_id', $order_item->product_id)
                    ->where('color_id', $order_item->color_id)
                    ->where('capacity', $order_item->capacity)
                    ->where('size', $order_item->size)
                    ->first();
    
                // If the quantity entry exists, update the quantity_product field
                if ($quantity) {
                    $quantity->quantity_product += $order_item->quantity;
                    $quantity->save();
                }
    
                // Delete the order item
                $order_item->delete();
            }
        }
    
        // Delete the order
        $order->delete();
    
        return redirect()->route('orders.index')->with('status', 'Order deleted successfully!');
    }
    public function orderclients()
    {
        $this->data['title'] = "trang đơn hàng";
        $cartCount = 0;
    
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Order_items::where('user_id', $userId)->whereNull('order_id')->get();
            $cartCount = count($cartItems);
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }
        $category1 = Category::whereNotNull('component_id')->get();
        $category2 = Category::whereNull('component_id')->get();
        $brand1 = Brand::whereNotNull('category_id')->get();
        $brand2 = Brand::whereNull('category_id')->get();
    
        $orders = Orders::where('user_id',$userId)->get();
        $shipping_methods= ShippingMethods::all();
        
        // Create an associative array to store the order item counts
        $order_item_Counts = [];
        foreach ($orders as $order) {
            $order_item_Counts[$order->order_id] = Order_items::where('order_id', $order->order_id)->count();
        }
        return view('clients.list_orders_clients', $this->data, compact('orders', 'order_item_Counts','shipping_methods','cartCount','category1','category2','brand1','brand2'));
    }
}

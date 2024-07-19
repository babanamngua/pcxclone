<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\ShippingMethods;

class OrderItemController extends Controller
{
    public $data =[];
    public function index($id)
    {
        $this->data['title'] = 'trang sản phẩm đơn hàng';
        $order_items = Order_items::where('order_id',$id)->get();
        $shippingmethods = ShippingMethods::all();
        $orders = Orders::where('order_id',$id)->get();
        return view('admin.order_items.list_order_items',$this->data,compact('order_items','orders','shippingmethods'));
    }
}
